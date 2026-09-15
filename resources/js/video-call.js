import { ZegoUIKitPrebuilt } from "@zegocloud/zego-uikit-prebuilt";
import { initAudioDetection, stopAudioDetection, setMicMuted } from "./audio-detection.js";

// ─── Single source-of-truth for mic mute state ───────────────────────────────
let isMicMuted = false;

// Reference to the ZEGOCLOUD instance – set after create(), before joinRoom
let zegoInstance = null;

// True only after the user passes the pre-join view and is inside the room.
// False again after onLeaveRoom fires.
let hasJoinedRoom = false;

/**
 * Apply isMicMuted to:
 *  1. ZEGOCLOUD's own local MediaStream (stops outgoing RTP audio)
 *     Only safe AFTER hasJoinedRoom=true AND localStream is populated.
 *     If localStream is not yet available (still being set up by ZEGOCLOUD
 *     asynchronously after join), we skip it here — onLocalStreamUpdated will
 *     fire and call applyMicState() again once the stream is live.
 *  2. AssemblyAI audio detection module (stops/resumes audio chunks)
 *  3. Custom button UI
 */
function applyMicState() {
    // ── 1. Mute/unmute ZEGOCLOUD outgoing audio ──────────────────────────────
    if (zegoInstance && hasJoinedRoom) {
        if (typeof zegoInstance.turnMicrophoneOn === "function") {
            zegoInstance.turnMicrophoneOn(!isMicMuted);
        } else if (zegoInstance.localStream) {
            zegoInstance.localStream.getAudioTracks().forEach((track) => {
                track.enabled = !isMicMuted;
            });
        }
        console.log("[MicControl] ZEGOCLOUD mic state set to enabled =", !isMicMuted);
    }

    // ── 2. Tell AssemblyAI audio detection to pause/resume ───────────────────
    setMicMuted(isMicMuted);

    // ── 3. Update the custom button UI ───────────────────────────────────────
    // updateMicButtonUI();
}

/**
 * Toggle the microphone. Called by the custom mic button.
 */
// function toggleMicrophone() {
//     isMicMuted = !isMicMuted;
//     console.log("[MicControl] Toggled isMicMuted →", isMicMuted);
//     applyMicState();
// }

/**
 * Update the custom mic button appearance to reflect current isMicMuted.
 */
// function updateMicButtonUI() {
//     const btn = document.getElementById("custom-mic-btn");
//     if (!btn) return;
//
//     const icon = btn.querySelector(".mic-icon");
//
//     if (isMicMuted) {
//         btn.setAttribute("aria-pressed", "true");
//         btn.classList.add("mic-muted");
//         
//         if (icon) {
//             icon.innerHTML = `<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
//                 <line x1="1" y1="1" x2="23" y2="23"></line>
//                 <path d="M9 9v3a3 3 0 0 0 5.12 2.12M15 9.34V4a3 3 0 0 0-5.94-.6"></path>
//                 <path d="M17 16.95A7 7 0 0 1 5 12v-2m14 0v2a7 7 0 0 1-.11 1.23"></path>
//                 <line x1="12" y1="19" x2="12" y2="22"></line>
//             </svg>`;
//         }
//     } else {
//         btn.setAttribute("aria-pressed", "false");
//         btn.classList.remove("mic-muted");
//         
//         if (icon) {
//             icon.innerHTML = `<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
//                 <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3z"></path>
//                 <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
//                 <line x1="12" y1="19" x2="12" y2="22"></line>
//             </svg>`;
//         }
//     }
// }

// ─── Main call initialisation ─────────────────────────────────────────────────

async function startCall() {
    const config = window.ZEGO_CONFIG || {};
    const { appID, roomID, sessionCode, userID, userName, userRole } = config;

    if (!appID || !roomID) {
        console.error("[MicControl] ZEGO_CONFIG is missing or invalid:", config);
        return;
    }

    // ── Fetch server token ───────────────────────────────────────────────────
    let serverSecret;
    try {
        const response = await fetch("/zego/token");
        if (!response.ok) throw new Error(`Token fetch failed: ${response.status}`);
        const data = await response.json();
        serverSecret = data.serverSecret;
    } catch (err) {
        console.error("[MicControl] Could not obtain ZEGOCLOUD token:", err);
        return;
    }

    const kitToken = ZegoUIKitPrebuilt.generateKitTokenForTest(
        Number(appID),
        serverSecret,
        roomID,
        String(userID),
        userName,
    );

    const zc = ZegoUIKitPrebuilt.create(kitToken);
    zegoInstance = zc;

    // Ensure the custom button shows the correct initial state (unmuted)
    // updateMicButtonUI();

    zc.joinRoom({
        container: document.getElementById("zego-container"),
        scenario: {
            mode: ZegoUIKitPrebuilt.OneONoneCall,
            config: {
                role: ZegoUIKitPrebuilt.Host,
            },
        },
        showScreenSharingButton: true,
        showPreJoinView: true,

        // ── Hide the default ZEGOCLOUD microphone toggle button ─────────────
        // Official documented ZegoCloudRoomConfig property (index.d.ts line 134).
        // Set to true to use Zego's native mic button which flawlessly triggers onMicrophoneStateUpdated
        showMyMicrophoneToggleButton: true,

        // ── onJoinRoom — fires when the user passes the pre-join view ────────
        // We set hasJoinedRoom=true and start AssemblyAI audio detection here.
        // We DO NOT rely on localStream being populated yet — ZEGOCLOUD sets
        // localStream asynchronously after room join. onLocalStreamUpdated below
        // handles the stream-level muting at the correct moment.
        onJoinRoom: () => {
            hasJoinedRoom = true;
            console.log("[MicControl] User joined room. Starting audio detection.");
            initAudioDetection(sessionCode, userID);

            // Show the custom mic button now that we are in the call
            // const micWrapper = document.getElementById("custom-mic-wrapper");
            // if (micWrapper) micWrapper.classList.remove("hidden");

            // Apply AssemblyAI and button state now; ZEGOCLOUD stream muting
            // will happen in onLocalStreamUpdated once localStream is available.
            setMicMuted(isMicMuted);
            // updateMicButtonUI();
        },

        // ── onLocalStreamUpdated — fires when ZEGOCLOUD's local stream is live ─
        // This is the ONLY reliable moment to mute/unmute the ZEGOCLOUD RTP track,
        // because localStream is guaranteed to be set by the time this fires.
        // index.d.ts line 244: (state: "created"|"published"|"stopped", streamId, stream?)
        onLocalStreamUpdated: (state) => {
            console.log("[MicControl] onLocalStreamUpdated state:", state);
            if (state === "created" || state === "published") {
                applyMicState();
            }
        },

        // ── onMicrophoneStateUpdated — SDK fires when it changes mic state ───
        // Typed in index.d.ts (v2.17.x): state is "ON" | "OFF".
        // Syncs our isMicMuted when ZEGOCLOUD internally changes the mic
        // (e.g., system interrupt, permission revoked, pre-join view toggle).
        onMicrophoneStateUpdated: (state) => {
            const nowMuted = (state === "OFF");
            console.log("[MicControl] onMicrophoneStateUpdated:", state, "→ isMicMuted:", nowMuted);
            if (isMicMuted !== nowMuted) {
                isMicMuted = nowMuted;
                applyMicState();
            }
        },

        onLeaveRoom: async () => {
            hasJoinedRoom = false;

            // Hide the custom mic button
            // const micWrapper = document.getElementById("custom-mic-wrapper");
            // if (micWrapper) micWrapper.classList.add("hidden");

            // Stop audio detection synchronously before any async work.
            // This sets captureAborted=true inside audio-detection.js so that
            // any in-flight getUserMedia promise knows to abort instead of
            // starting a new recording cycle post-call.
            stopAudioDetection();
            zegoInstance = null;

            // Mark session complete on the server
            const csrfMeta = document.querySelector('meta[name="csrf-token"]');
            if (csrfMeta) {
                try {
                    await fetch("/session/complete", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfMeta.content,
                        },
                        body: JSON.stringify({ room: window.ZEGO_CONFIG.roomID }),
                    });
                } catch (err) {
                    console.warn("[MicControl] session/complete fetch failed:", err);
                }
            }

            if (userRole === "student") {
                document.getElementById("reviewModal")?.classList.remove("hidden");
            } else {
                window.location.href = "/dashboard/mentor";
            }
        },
    });
}

// ─── Wire the custom mic button ───────────────────────────────────────────────

document.addEventListener("DOMContentLoaded", () => {
    if (!document.getElementById("zego-container")) return;

    // Attach the custom button click handler
    const micBtn = document.getElementById("custom-mic-btn");
    if (micBtn) {
        micBtn.addEventListener("click", toggleMicrophone);
    }

    startCall();
});
