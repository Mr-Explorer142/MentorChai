<?php

namespace App\Http\Controllers;

use App\Models\MentoringSession;
use App\Models\SecurityEvent;
use App\Services\AssemblyAIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * AudioDetectionController
 *
 * Receives short audio segments from the browser during an active call,
 * validates them, then forwards to AssemblyAI for transcription.
 * The actual detection happens in the webhook (AssemblyAIWebhookController).
 */
class AudioDetectionController extends Controller
{
    public function __construct(
        private readonly AssemblyAIService $assemblyAI
    ) {}

    /* ─────────────────────────────────────────────────────────────────
     | POST /audio-detection
     ───────────────────────────────────────────────────────────────── */

    public function store(Request $request)
    {
        $t_upload_received = now()->toISOString();

        // ── 1. Validate ──────────────────────────────────────────────
        $request->validate([
            'audio'        => 'required|file|max:5120', // max 5 MB
            'session_code' => 'required|string|max:64',
            'user_id'      => 'required|integer',
        ]);

        // Confirm the file has an audio MIME type
        $mime = $request->file('audio')->getMimeType();
        if (!str_starts_with($mime ?? '', 'audio/') && $mime !== 'video/webm' && $mime !== 'application/octet-stream') {
            Log::warning('[AudioDetection] Rejected non-audio upload', ['mime' => $mime]);
            return response()->json(['error' => 'Invalid file type'], 422);
        }

        // ── 2. Authorise: caller must be a participant of this session ──
        $sessionCode = $request->input('session_code');
        $userId      = (int) $request->input('user_id');
        $authUser    = $request->user();

        if ($authUser->id !== $userId) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $session = MentoringSession::where('session_code', $sessionCode)->first();
        if (!$session || ($authUser->id !== $session->mentor_id && $authUser->id !== $session->student_id)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        // ── 3. Save audio to temporary storage ───────────────────────
        $tmpFile    = $request->file('audio');
        $extension  = $tmpFile->extension() ?: 'webm';
        $tmpPath    = $tmpFile->storeAs(
            'audio-detection/tmp',
            uniqid('seg_', true) . '.' . $extension,
            'local'
        );
        $fullPath = Storage::disk('local')->path($tmpPath);

        // ── 4. Upload to AssemblyAI ───────────────────────────────────
        Log::info('[AudioDetection] Uploading to AssemblyAI', [
            'session_code'       => $sessionCode,
            'user_id'            => $userId,
            'upload_received_at' => $t_upload_received,
            'assemblyai_submit'  => now()->toISOString(),
        ]);

        $uploadUrl = $this->assemblyAI->uploadFile($fullPath);

        if (!$uploadUrl) {
            // Cleanup temp and fail gracefully
            Storage::disk('local')->delete($tmpPath);
            Log::error('[AudioDetection] AssemblyAI upload failed', ['session_code' => $sessionCode]);
            return response()->json(['accepted' => false, 'reason' => 'upload_failed'], 500);
        }

        // ── 5. Submit transcription job ───────────────────────────────
        // Webhook URL — must be publicly reachable.
        $webhookUrl = route('audio-detection.webhook');

        // We encode session context in the webhook URL query string so we
        // can identify the call when the webhook fires.
        $webhookUrl .= '?' . http_build_query([
            'session_code'     => $sessionCode,
            'user_id'          => $userId,
            'participant_role' => $authUser->id === $session->mentor_id ? 'mentor' : 'student',
        ]);

        $transcriptId = $this->assemblyAI->submitTranscription($uploadUrl, $webhookUrl);

        // Cleanup temp file — AssemblyAI has it now
        Storage::disk('local')->delete($tmpPath);

        if (!$transcriptId) {
            Log::error('[AudioDetection] AssemblyAI transcription submit failed', ['session_code' => $sessionCode]);
            return response()->json(['accepted' => false, 'reason' => 'transcription_submit_failed'], 500);
        }

        Log::info('[AudioDetection] Transcription job submitted', [
            'transcript_id' => $transcriptId,
            'session_code'  => $sessionCode,
            'submitted_at'  => now()->toISOString(),
        ]);

        // ── 6. Direct Polling Fallback (for localhost / rapid detection) ───────
        // Poll AssemblyAI directly up to 6 times (max ~3.0 seconds) so detection
        // works locally on localhost where webhooks cannot reach.
        $transcriptText = null;
        for ($i = 0; $i < 6; $i++) {
            usleep(500000); // 500ms
            $res = $this->assemblyAI->getTranscript($transcriptId);
            $status = $res['status'] ?? '';
            if ($status === 'completed') {
                $transcriptText = $res['text'] ?? '';
                break;
            }
            if ($status === 'error') {
                Log::warning('[AudioDetection] AssemblyAI transcript error', ['id' => $transcriptId]);
                break;
            }
        }

        if ($transcriptText !== null && trim($transcriptText) !== '') {
            Log::info('[AudioDetection] Synchronous transcript text received', [
                'transcript_id' => $transcriptId,
                'text'          => $transcriptText,
            ]);

            $detector = new \App\Services\AudioContactDetector();
            $analysis = $detector->analyse($transcriptText);

            if ($analysis['detected']) {
                // Cooldown check (25 seconds)
                $recent = SecurityEvent::where('session_code', $sessionCode)
                    ->where('user_id', $userId)
                    ->where('detected_at', '>=', now()->subSeconds(25))
                    ->first();

                if (!$recent) {
                    $event = SecurityEvent::create([
                        'session_code'       => $sessionCode,
                        'user_id'            => $userId,
                        'participant_role'   => $authUser->id === $session->mentor_id ? 'mentor' : 'student',
                        'detection_type'     => $analysis['type'],
                        'detection_category' => $analysis['category'],
                        'raw_transcript'     => $transcriptText,
                        'matched_fragment'   => $analysis['fragment'],
                        'source'             => 'audio_detection',
                        'detected_at'        => now(),
                    ]);

                    Log::warning('[AudioDetection] Security Event created synchronously!', [
                        'event_id'       => $event->id,
                        'type'           => $analysis['type'],
                        'matched'        => $analysis['fragment'],
                    ]);
                }
            }
        }

        // Return immediately
        return response()->json([
            'accepted'      => true,
            'transcript_id' => $transcriptId,
        ]);
    }

    /* ─────────────────────────────────────────────────────────────────
     | GET /audio-detection/poll?session_code=&since_id=
     |
     | The in-call browser polls this every 3-5 seconds to learn about
     | new security events for the current call.
     ───────────────────────────────────────────────────────────────── */

    public function poll(Request $request)
    {
        $request->validate([
            'session_code' => 'required|string|max:64',
            'since_id'     => 'nullable|integer',
        ]);

        $sessionCode = $request->input('session_code');
        $sinceId     = (int) ($request->input('since_id', 0));

        // Only the participants of this session may poll
        $session = MentoringSession::where('session_code', $sessionCode)->first();
        $authUser = $request->user();

        if (!$session || ($authUser->id !== $session->mentor_id && $authUser->id !== $session->student_id)) {
            return response()->json(['events' => []]);
        }

        $events = SecurityEvent::where('session_code', $sessionCode)
            ->when($sinceId > 0, fn ($q) => $q->where('id', '>', $sinceId))
            ->orderBy('id')
            ->get(['id', 'detection_type', 'detection_category', 'detected_at']);

        return response()->json(['events' => $events]);
    }
}
