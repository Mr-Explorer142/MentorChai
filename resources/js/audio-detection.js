/**
 * audio-detection.js
 *
 * Client-side audio detection recorder for MentorChai live calls.
 *
 * Responsibilities:
 *  - Capture microphone audio during an active ZEGOCLOUD call
 *  - Record short finalized segments (~4 seconds)
 *  - Upload each segment to Laravel for AssemblyAI transcription
 *  - Poll Laravel for new security events
 *  - Show an in-call warning modal when contact information is detected
 *  - Clean up everything when the call ends
 *
 * This module is PASSIVE — it does NOT modify the ZEGOCLOUD call in any way.
 * It is loaded via @vite in live-session.blade.php after ZEGO_CONFIG is set.
 */

// ── Configuration ───────────────────────────────────────────────────────────

const SEGMENT_DURATION_MS  = 4000;   // length of each audio recording cycle
const POLL_INTERVAL_MS     = 4000;   // how often to ask Laravel for new events
const UPLOAD_ENDPOINT      = '/audio-detection';
const POLL_ENDPOINT        = '/audio-detection/poll';

// ── State ────────────────────────────────────────────────────────────────────

let mediaRecorder   = null;
let mediaStream     = null;
let recordingActive = false;
let cycleTimer      = null;
let pollTimer       = null;
let lastSeenEventId = 0;
let sessionCode     = null;
let currentUserId   = null;
let csrfToken       = null;

// ── Latency logging ──────────────────────────────────────────────────────────

function logTs(label) {
    console.log(`[AudioDetection] ${label} @ ${new Date().toISOString()}`);
}

// ── Initialise ───────────────────────────────────────────────────────────────

/**
 * Called from live-session.blade.php once the call starts.
 * @param {string} roomId  - The ZEGOCLOUD room ID (= session_code)
 * @param {number} userId  - The authenticated user's ID
 */
export function initAudioDetection(roomId, userId) {
    sessionCode   = roomId;
    currentUserId = userId;
    csrfToken     = document.querySelector('meta[name="csrf-token"]')?.content ?? '';

    logTs('init');

    // Check browser support
    if (typeof MediaRecorder === 'undefined') {
        console.warn('[AudioDetection] MediaRecorder not supported. Detection disabled.');
        return;
    }

    startCapture();
}

let isMicMutedState = false;
let audioContext    = null;
let audioAnalyser   = null;
let maxRmsVolume    = 0;

/**
 * Detects if the microphone is currently muted in ZEGOCLOUD UI or media track state.
 * @returns {boolean}
 */
export function isZegoMicrophoneMutedInUI() {
    if (isMicMutedState) return true;

    const container = document.getElementById('zego-container');
    if (!container) return false;

    // 1. Direct WebRTC Track Inspection from ZEGOCLOUD media elements
    const mediaElements = container.querySelectorAll('video, audio');
    for (const el of mediaElements) {
        if (el.srcObject && typeof el.srcObject.getAudioTracks === 'function') {
            const tracks = el.srcObject.getAudioTracks();
            for (const track of tracks) {
                if (track.enabled === false || track.muted === true) {
                    return true;
                }
            }
        }
    }

    // 2. Search for elements with title/aria-label/data-tip indicating "Turn on mic" or "Unmute"
    const elements = container.querySelectorAll('button, div[role="button"], [title], [aria-label], [data-tip]');
    for (const el of elements) {
        const title = (el.getAttribute('title') || '').toLowerCase();
        const aria  = (el.getAttribute('aria-label') || '').toLowerCase();
        const tip   = (el.getAttribute('data-tip') || '').toLowerCase();

        if (title.includes('turn on mic') || title.includes('unmute') || title.includes('enable mic') ||
            aria.includes('turn on mic') || aria.includes('unmute') || aria.includes('enable mic') ||
            tip.includes('turn on mic') || tip.includes('unmute') || tip.includes('enable mic')) {
            return true;
        }
    }

    // 3. Search for SVG icons with slash lines (multiple paths or line tags) inside ZEGOCLOUD control bar
    const svgs = container.querySelectorAll('svg');
    for (const svg of svgs) {
        const paths = svg.querySelectorAll('path');
        const lines = svg.querySelectorAll('line');
        const svgHtml = svg.outerHTML.toLowerCase();

        const hasSlash = lines.length > 0 || paths.length >= 2 || svgHtml.includes('<line') ||
                         svgHtml.includes('slash') || svgHtml.includes('strike') || 
                         svgHtml.includes('l21 21') || svgHtml.includes('l20 20') || svgHtml.includes('l19 19');

        if (hasSlash) {
            const parent = svg.closest('button, div');
            const parentText = parent ? (parent.outerHTML + ' ' + (parent.innerText || '')).toLowerCase() : svgHtml;
            // Ignore red end call button or video button
            if (!parentText.includes('red') && !parentText.includes('hangup') && !parentText.includes('camera') && !parentText.includes('video')) {
                return true;
            }
        }
    }

    return false;
}

/**
 * Enable or disable audio detection microphone tracks based on ZEGOCLOUD mic state.
 * @param {boolean} isMuted
 */
export function setAudioDetectionMuted(isMuted) {
    isMicMutedState = !!isMuted;
    if (mediaStream) {
        mediaStream.getAudioTracks().forEach(t => {
            t.enabled = !isMicMutedState;
        });
    }
}

/**
 * Call this when the ZEGOCLOUD call ends to clean everything up.
 */
export function stopAudioDetection() {
    recordingActive = false;

    if (cycleTimer) { clearTimeout(cycleTimer);  cycleTimer  = null; }
    if (pollTimer)  { clearInterval(pollTimer);   pollTimer   = null; }

    if (mediaRecorder && mediaRecorder.state !== 'inactive') {
        try { mediaRecorder.stop(); } catch (_) {}
    }

    if (mediaStream) {
        mediaStream.getTracks().forEach(t => t.stop());
        mediaStream = null;
    }

    if (audioContext) {
        try { audioContext.close(); } catch (_) {}
        audioContext = null;
        audioAnalyser = null;
    }

    logTs('stopped');
}

// ── Audio capture ─────────────────────────────────────────────────────────────

async function startCapture() {
    try {
        mediaStream = await navigator.mediaDevices.getUserMedia({ audio: true, video: false });
        logTs('microphone_acquired');
        recordingActive = true;

        // Setup Web Audio Analyser to monitor real-time volume RMS
        try {
            const AudioCtx = window.AudioContext || window.webkitAudioContext;
            if (AudioCtx) {
                audioContext  = new AudioCtx();
                const source  = audioContext.createMediaStreamSource(mediaStream);
                audioAnalyser = audioContext.createAnalyser();
                audioAnalyser.fftSize = 256;
                source.connect(audioAnalyser);
            }
        } catch (e) {
            console.warn('[AudioDetection] Web Audio Analyser setup failed:', e);
        }

        // Attach touch & click listeners on zego-container for mobile button taps
        const zegoContainer = document.getElementById('zego-container');
        if (zegoContainer) {
            const handleTouch = () => {
                setTimeout(() => {
                    const muted = isZegoMicrophoneMutedInUI();
                    setAudioDetectionMuted(muted);
                }, 150);
            };
            zegoContainer.addEventListener('click', handleTouch, true);
            zegoContainer.addEventListener('touchstart', handleTouch, true);
        }

        // 500ms interval scanner to continuously sync ZEGOCLOUD mic UI mute state
        setInterval(() => {
            if (!recordingActive) return;
            const muted = isZegoMicrophoneMutedInUI();
            setAudioDetectionMuted(muted);
        }, 500);

        startRecordingCycle();
        startPolling();
    } catch (err) {
        console.error('[AudioDetection] Could not get microphone:', err);
        // Do not break the call — just disable detection silently
    }
}

// ── Recording cycle ───────────────────────────────────────────────────────────

function startRecordingCycle() {
    if (!recordingActive || !mediaStream) return;

    // Check if microphone is muted in ZEGOCLOUD UI or state
    if (isZegoMicrophoneMutedInUI()) {
        logTs('mic_is_muted_skipping_recording_cycle');
        if (mediaStream) {
            mediaStream.getAudioTracks().forEach(t => { t.enabled = false; });
        }
        cycleTimer = setTimeout(startRecordingCycle, 2000);
        return;
    } else {
        if (mediaStream) {
            mediaStream.getAudioTracks().forEach(t => { t.enabled = true; });
        }
    }

    logTs('recording_started');
    maxRmsVolume = 0;

    // Monitor volume RMS during cycle
    let volumeCheckInterval = null;
    if (audioAnalyser) {
        const dataArray = new Uint8Array(audioAnalyser.frequencyBinCount);
        volumeCheckInterval = setInterval(() => {
            if (!audioAnalyser) return;
            audioAnalyser.getByteFrequencyData(dataArray);
            let sum = 0;
            for (let i = 0; i < dataArray.length; i++) {
                sum += dataArray[i];
            }
            const avg = sum / dataArray.length;
            if (avg > maxRmsVolume) maxRmsVolume = avg;
        }, 100);
    }

    // Pick a supported MIME type
    const mimeType = getSupportedMimeType();
    const options  = mimeType ? { mimeType } : {};

    let recorder;
    try {
        recorder = new MediaRecorder(mediaStream, options);
    } catch (err) {
        console.error('[AudioDetection] MediaRecorder creation failed:', err);
        if (volumeCheckInterval) clearInterval(volumeCheckInterval);
        return;
    }

    mediaRecorder = recorder;
    const chunks  = [];

    recorder.ondataavailable = (e) => {
        if (e.data && e.data.size > 0) {
            chunks.push(e.data);
        }
    };

    recorder.onstop = async () => {
        logTs('recording_stopped');
        if (volumeCheckInterval) clearInterval(volumeCheckInterval);

        // Guard 1: Abort if mic was muted in UI during cycle
        if (isZegoMicrophoneMutedInUI()) {
            logTs('mic_muted_during_cycle_aborting_upload');
            scheduleNextCycle();
            return;
        }

        // Guard 2: Abort if average audio volume was silent / below noise floor
        // maxRmsVolume < 3.0 means virtually silence / muted mic input
        if (audioAnalyser && maxRmsVolume < 3.0) {
            logTs(`audio_silent_skipping_upload (max_vol: ${maxRmsVolume})`);
            scheduleNextCycle();
            return;
        }

        if (chunks.length === 0) {
            scheduleNextCycle();
            return;
        }

        const blob = new Blob(chunks, { type: mimeType || 'audio/webm' });
        await uploadSegment(blob, mimeType);
        scheduleNextCycle();
    };

    recorder.onerror = (err) => {
        console.error('[AudioDetection] MediaRecorder error:', err);
        scheduleNextCycle();
    };

    // Start recording — collect everything into one blob when stopped
    recorder.start();

    // Stop after SEGMENT_DURATION_MS to finalize the blob
    cycleTimer = setTimeout(() => {
        if (recorder.state === 'recording') {
            recorder.stop();
        }
    }, SEGMENT_DURATION_MS);
}

function scheduleNextCycle() {
    if (!recordingActive) return;
    // Small gap so the browser finishes the previous stop cleanly
    setTimeout(startRecordingCycle, 200);
}

// ── Upload ─────────────────────────────────────────────────────────────────────

async function uploadSegment(blob, mimeType) {
    logTs('upload_started');

    const ext      = mimeTypeToExtension(mimeType);
    const formData = new FormData();
    formData.append('audio',        blob, `segment.${ext}`);
    formData.append('session_code', sessionCode);
    formData.append('user_id',      String(currentUserId));
    formData.append('_token',       csrfToken);

    try {
        const res = await fetch(UPLOAD_ENDPOINT, {
            method:  'POST',
            body:    formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
        });

        if (!res.ok) {
            console.warn('[AudioDetection] Upload failed', res.status);
        } else {
            logTs('upload_completed');
        }
    } catch (err) {
        // Network error — log and continue; call must not be affected
        console.error('[AudioDetection] Upload error:', err);
    }
}

// ── Polling ────────────────────────────────────────────────────────────────────

function startPolling() {
    pollTimer = setInterval(pollForEvents, POLL_INTERVAL_MS);
}

async function pollForEvents() {
    try {
        const url = `${POLL_ENDPOINT}?session_code=${encodeURIComponent(sessionCode)}&since_id=${lastSeenEventId}`;
        const res = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN':     csrfToken,
            },
        });

        if (!res.ok) return;

        const data = await res.json();
        const events = data.events ?? [];

        for (const event of events) {
            if (event.id > lastSeenEventId) {
                lastSeenEventId = event.id;
                logTs('alert_displayed');
                showWarningModal(event.detection_type);
            }
        }
    } catch (_) {
        // Polling failure is non-critical — the call continues
    }
}

// ── Warning Modal ──────────────────────────────────────────────────────────────

const DETECTION_LABELS = {
    phone_number:         'Phone Number',
    phone_number_context: 'Phone Number Context',
    email_address:        'Email Address',
    email_context:        'Email Mention',
    whatsapp:             'WhatsApp',
    telegram:             'Telegram',
};

function showWarningModal(detectionType) {
    // Remove any existing modal first
    const existing = document.getElementById('audio-detection-modal');
    if (existing) existing.remove();

    const label = DETECTION_LABELS[detectionType] ?? detectionType;

    const modal = document.createElement('div');
    modal.id = 'audio-detection-modal';
    modal.setAttribute('role', 'alertdialog');
    modal.setAttribute('aria-modal', 'true');
    modal.setAttribute('aria-labelledby', 'adm-title');
    modal.style.cssText = `
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 99999;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding-top: 80px;
        pointer-events: none;
    `;

    modal.innerHTML = `
        <div id="adm-box" style="
            pointer-events: auto;
            background: linear-gradient(135deg, #fff7ed 0%, #fff 100%);
            border: 1.5px solid #f97316;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(249,115,22,0.22), 0 4px 16px rgba(0,0,0,0.10);
            padding: 24px 28px;
            max-width: 400px;
            width: 90%;
            animation: adm-slide-in 0.28s cubic-bezier(0.34, 1.56, 0.64, 1) both;
            position: relative;
        ">
            <style>
                @keyframes adm-slide-in {
                    from { opacity: 0; transform: translateY(-24px) scale(0.96); }
                    to   { opacity: 1; transform: translateY(0)      scale(1);    }
                }
            </style>

            <!-- Icon + title row -->
            <div style="display:flex; align-items:center; gap:12px; margin-bottom:14px;">
                <div style="
                    width: 40px; height: 40px; border-radius: 10px; flex-shrink: 0;
                    background: linear-gradient(135deg, #f97316, #ef4444);
                    display: flex; align-items: center; justify-content: center;
                    box-shadow: 0 4px 12px rgba(249,115,22,0.35);
                ">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                    </svg>
                </div>
                <div>
                    <div id="adm-title" style="font-weight:700; font-size:15px; color:#9a3412; line-height:1.3;">
                        Security Warning
                    </div>
                    <div style="font-size:12px; color:#c2410c; margin-top:2px;">
                        Contact info sharing detected
                    </div>
                </div>
                <button id="adm-close" aria-label="Dismiss" style="
                    margin-left: auto; background: none; border: none; cursor: pointer;
                    color: #9a3412; font-size: 20px; line-height: 1; padding: 4px; border-radius: 6px;
                    transition: background 0.15s;
                " onmouseenter="this.style.background='rgba(249,115,22,0.1)'"
                  onmouseleave="this.style.background='none'">✕</button>
            </div>

            <div style="
                background: rgba(249,115,22,0.08);
                border: 1px solid rgba(249,115,22,0.2);
                border-radius: 10px;
                padding: 12px 14px;
                margin-bottom: 16px;
            ">
                <div style="font-size:12px; color:#9a3412; text-transform:uppercase; letter-spacing:0.06em; font-weight:600; margin-bottom:4px;">
                    Detected type
                </div>
                <div style="font-size:16px; font-weight:700; color:#c2410c;">
                    ${label}
                </div>
            </div>

            <p style="font-size:13px; color:#78350f; margin:0 0 16px; line-height:1.5;">
                A participant may be sharing contact information. This event has been logged for review.
            </p>

            <button id="adm-dismiss" style="
                width: 100%; padding: 10px; border: none; border-radius: 10px; cursor: pointer;
                font-size: 14px; font-weight: 600; color: white;
                background: linear-gradient(135deg, #f97316, #ef4444);
                box-shadow: 0 4px 12px rgba(249,115,22,0.30);
                transition: opacity 0.15s;
            " onmouseenter="this.style.opacity='0.88'" onmouseleave="this.style.opacity='1'">
                Dismiss
            </button>
        </div>
    `;

    document.body.appendChild(modal);

    // Auto-dismiss after 12 seconds
    const autoDismiss = setTimeout(() => closeWarningModal(), 12000);

    document.getElementById('adm-close')?.addEventListener('click', () => {
        clearTimeout(autoDismiss);
        closeWarningModal();
    });
    document.getElementById('adm-dismiss')?.addEventListener('click', () => {
        clearTimeout(autoDismiss);
        closeWarningModal();
    });
}

function closeWarningModal() {
    const modal = document.getElementById('audio-detection-modal');
    if (!modal) return;
    const box = document.getElementById('adm-box');
    if (box) {
        box.style.transition = 'opacity 0.2s, transform 0.2s';
        box.style.opacity    = '0';
        box.style.transform  = 'translateY(-12px) scale(0.96)';
    }
    setTimeout(() => modal.remove(), 220);
}

// ── Utilities ──────────────────────────────────────────────────────────────────

function getSupportedMimeType() {
    const candidates = [
        'audio/webm;codecs=opus',
        'audio/webm',
        'audio/ogg;codecs=opus',
        'audio/ogg',
        'audio/mp4',
    ];
    for (const type of candidates) {
        if (MediaRecorder.isTypeSupported(type)) return type;
    }
    return null;
}

function mimeTypeToExtension(mimeType) {
    if (!mimeType) return 'webm';
    if (mimeType.includes('ogg'))  return 'ogg';
    if (mimeType.includes('mp4'))  return 'mp4';
    return 'webm';
}
