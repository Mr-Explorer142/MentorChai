<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * AssemblyAIService
 *
 * Handles all communication with the AssemblyAI REST API.
 * The API key must be set in config('services.assemblyai.key')
 * which reads from ASSEMBLYAI_API_KEY in .env.
 *
 * Flow:
 *   1. uploadFile()       — upload raw audio bytes, get upload URL
 *   2. submitTranscription() — create transcription job, get job ID
 *   (AssemblyAI calls our webhook when done)
 */
class AssemblyAIService
{
    private const BASE_URL = 'https://api.assemblyai.com/v2';

    private function apiKey(): string
    {
        return config('services.assemblyai.key', '');
    }

    private function headers(): array
    {
        return [
            'Authorization' => $this->apiKey(),
            'Content-Type'  => 'application/json',
        ];
    }

    /* ─────────────────────────────────────────────────────────────────
     | Step 1: Upload the audio file to AssemblyAI's storage
     ───────────────────────────────────────────────────────────────── */

    /**
     * Upload a local file path to AssemblyAI and return the upload URL.
     * Returns null on failure.
     */
    public function uploadFile(string $localPath): ?string
    {
        try {
            $audioContent = file_get_contents($localPath);
            if ($audioContent === false) {
                Log::error('[AssemblyAI] Could not read audio file', ['path' => $localPath]);
                return null;
            }

            $response = Http::withHeaders([
                'Authorization' => $this->apiKey(),
                'Content-Type'  => 'application/octet-stream',
            ])->withBody($audioContent, 'application/octet-stream')
              ->post(self::BASE_URL . '/upload');

            if ($response->failed()) {
                Log::error('[AssemblyAI] Upload failed', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);
                return null;
            }

            return $response->json('upload_url');
        } catch (\Throwable $e) {
            Log::error('[AssemblyAI] Upload exception', ['message' => $e->getMessage()]);
            return null;
        }
    }

    /* ─────────────────────────────────────────────────────────────────
     | Step 2: Submit a transcription job
     ───────────────────────────────────────────────────────────────── */

    /**
     * Submit a transcription job to AssemblyAI.
     * $webhookUrl — the URL AssemblyAI will POST to when done.
     * Returns the transcription job ID, or null on failure.
     */
    public function submitTranscription(string $audioUrl, string $webhookUrl, array $meta = []): ?string
    {
        try {
            $payload = [
                'audio_url'           => $audioUrl,
                'webhook_url'         => $webhookUrl,
                'language_detection'  => true,   // auto-detect language (handles mixed Bengali/English)
                'punctuate'           => true,
                'format_text'         => false,  // keep raw transcript so regex is simpler
            ];

            // Attach arbitrary metadata as webhook_auth_header_name/value not needed here —
            // we pass meta as a JSON-encoded header value instead to identify the job later.
            // AssemblyAI does not support arbitrary metadata, so we store it ourselves.

            $response = Http::withHeaders($this->headers())
                ->post(self::BASE_URL . '/transcript', $payload);

            if ($response->failed()) {
                Log::error('[AssemblyAI] Transcription submit failed', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);
                return null;
            }

            return $response->json('id');
        } catch (\Throwable $e) {
            Log::error('[AssemblyAI] Submit exception', ['message' => $e->getMessage()]);
            return null;
        }
    }

    /* ─────────────────────────────────────────────────────────────────
     | Optional: Poll for status (fallback if webhook is unreachable)
     ───────────────────────────────────────────────────────────────── */

    public function getTranscript(string $transcriptId): array
    {
        try {
            $response = Http::withHeaders($this->headers())
                ->get(self::BASE_URL . '/transcript/' . $transcriptId);

            if ($response->failed()) {
                return ['status' => 'error', 'text' => null];
            }

            return $response->json() ?? ['status' => 'error', 'text' => null];
        } catch (\Throwable $e) {
            Log::error('[AssemblyAI] GetTranscript exception', ['message' => $e->getMessage()]);
            return ['status' => 'error', 'text' => null];
        }
    }
}
