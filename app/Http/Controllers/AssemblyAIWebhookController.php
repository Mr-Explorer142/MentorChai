<?php

namespace App\Http\Controllers;

use App\Models\SecurityEvent;
use App\Services\AudioContactDetector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * AssemblyAIWebhookController
 *
 * Receives the transcription-complete callback from AssemblyAI.
 * Runs the AudioContactDetector and persists any security events.
 *
 * This endpoint MUST be excluded from CSRF verification
 * (add it to App\Http\Middleware\VerifyCsrfToken $except).
 */
class AssemblyAIWebhookController extends Controller
{
    /* Minimum seconds between the same detection type for the same call.
       Prevents duplicate alerts for overlapping audio segments. */
    private const COOLDOWN_SECONDS = 25;

    public function __construct(
        private readonly AudioContactDetector $detector
    ) {}

    /* ─────────────────────────────────────────────────────────────────
     | POST /audio-detection/webhook
     ───────────────────────────────────────────────────────────────── */

    public function handle(Request $request)
    {
        $t_webhook_received = now()->toISOString();

        // ── 1. Parse session context from query string ────────────────
        $sessionCode     = $request->query('session_code', '');
        $userId          = (int) $request->query('user_id', 0);
        $participantRole = $request->query('participant_role', '');

        // ── 2. Parse AssemblyAI payload ───────────────────────────────
        $payload      = $request->all();
        $status       = $payload['status']  ?? '';
        $transcriptId = $payload['transcript_id'] ?? ($payload['id'] ?? '');
        $text         = $payload['text']    ?? null;

        Log::info('[Webhook] AssemblyAI callback received', [
            'transcript_id'      => $transcriptId,
            'status'             => $status,
            'session_code'       => $sessionCode,
            'webhook_received'   => $t_webhook_received,
        ]);

        // ── 3. Only process completed transcriptions ──────────────────
        if ($status !== 'completed') {
            if ($status === 'error') {
                Log::warning('[Webhook] Transcription error from AssemblyAI', [
                    'transcript_id' => $transcriptId,
                    'error'         => $payload['error'] ?? 'unknown',
                ]);
            }
            return response()->json(['ok' => true]); // always ACK
        }

        if (empty($text) || empty($sessionCode) || $userId === 0) {
            Log::warning('[Webhook] Missing data, skipping detection', compact('sessionCode', 'userId'));
            return response()->json(['ok' => true]);
        }

        // ── 4. Run detection ─────────────────────────────────────────
        $result = $this->detector->analyse($text);

        Log::info('[Webhook] Detection result', [
            'transcript_id'  => $transcriptId,
            'session_code'   => $sessionCode,
            'detected'       => $result['detected'],
            'all_matches'    => $result['all_matches'],
            'detection_at'   => now()->toISOString(),
        ]);

        if (!$result['detected']) {
            return response()->json(['ok' => true]);
        }

        // ── 5. Persist security events (with cooldown) ────────────────
        foreach ($result['all_matches'] as $detectionType) {
            $this->persistIfNotInCooldown(
                $sessionCode,
                $userId,
                $participantRole,
                $detectionType,
                $result['detection_category']
            );
        }

        return response()->json(['ok' => true]);
    }

    /* ─────────────────────────────────────────────────────────────────
     | Helpers
     ───────────────────────────────────────────────────────────────── */

    private function persistIfNotInCooldown(
        string $sessionCode,
        int    $userId,
        string $participantRole,
        string $detectionType,
        ?string $category
    ): void {
        $cutoff = now()->subSeconds(self::COOLDOWN_SECONDS);

        $alreadyRecent = SecurityEvent::where('session_code', $sessionCode)
            ->where('user_id', $userId)
            ->where('detection_type', $detectionType)
            ->where('detected_at', '>=', $cutoff)
            ->exists();

        if ($alreadyRecent) {
            Log::debug('[Webhook] Skipping duplicate (cooldown)', [
                'session_code'   => $sessionCode,
                'detection_type' => $detectionType,
            ]);
            return;
        }

        try {
            SecurityEvent::create([
                'session_code'       => $sessionCode,
                'user_id'            => $userId,
                'participant_role'   => $participantRole,
                'detection_type'     => $detectionType,
                'detection_category' => $category,
                'source'             => 'audio',
                'detected_at'        => now(),
            ]);

            Log::info('[Webhook] Security event saved', [
                'session_code'   => $sessionCode,
                'detection_type' => $detectionType,
            ]);
        } catch (\Throwable $e) {
            Log::error('[Webhook] Failed to save security event', ['error' => $e->getMessage()]);
        }
    }
}
