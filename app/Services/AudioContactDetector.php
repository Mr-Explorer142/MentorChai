<?php

namespace App\Services;

/**
 * AudioContactDetector
 *
 * Analyses a raw speech transcript and detects whether it contains
 * any contact-information patterns (phone numbers, WhatsApp, Telegram,
 * email addresses or e-mail context phrases).
 *
 * Returns an array:
 *   [
 *     'detected'          => bool,
 *     'detection_type'    => string|null,   // most significant type
 *     'detection_category'=> string|null,   // 'contact_information'
 *     'all_matches'       => string[],      // every matched type
 *   ]
 */
class AudioContactDetector
{
    /* ─────────────────────────────────────────────────────────────────
     | Normalise
     ───────────────────────────────────────────────────────────────── */

    /**
     * Normalise an English/mixed transcript for matching.
     * Keeps Bengali characters intact so Bengali patterns can still match.
     */
    private function normalise(string $text): string
    {
        // Lowercase English characters only
        $text = mb_strtolower($text, 'UTF-8');

        // Remove punctuation that commonly appears between phone digits
        // e.g. "017-123 4567" → "017 123 4567"
        $text = preg_replace('/[.\-,;:!?()[\]{}|\\\\\/]/', ' ', $text);

        // Collapse multiple whitespace
        $text = preg_replace('/\s+/', ' ', $text);

        // Normalise common WhatsApp misspellings / transliterations
        $text = str_replace(
            ['whats app', 'what\'s app', 'whatsap', 'watsapp', 'wattsapp'],
            'whatsapp',
            $text
        );

        return trim($text);
    }

    /* ─────────────────────────────────────────────────────────────────
     | Phone number detection
     ───────────────────────────────────────────────────────────────── */

    /**
     * Strip all spaces from a string so we can match compacted digit runs.
     */
    private function compactDigits(string $text): string
    {
        return preg_replace('/\s+/', '', $text);
    }

    /**
     * Detect Bangladesh mobile number patterns.
     *
     * Local:        01[3-9]XXXXXXXX  (11 digits)
     * International: +8801[3-9]XXXXXXXX  (13 digits after +)
     *
     * The transcript may have spaces between digit groups, so we check
     * both spaced and compact versions.
     */
    private function detectPhoneNumber(string $normalised): bool
    {
        // Pattern allowing optional single spaces between digit groups
        // e.g. "017 1234 5678", "017-1234-5678" (dashes already replaced by spaces)
        $localPattern = '/\b0 ?1 ?[3-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9]\b/u';
        $intlPattern  = '/\+? ?8 ?8 ?0 ?1 ?[3-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9] ?[0-9]\b/u';

        // Also check compact version to catch "01712345678" written as one block
        $compact      = $this->compactDigits($normalised);
        $localCompact = '/01[3-9][0-9]{8}/u';
        $intlCompact  = '/(\+?88)?01[3-9][0-9]{8}/u';

        return preg_match($localPattern, $normalised)
            || preg_match($intlPattern,  $normalised)
            || preg_match($localCompact, $compact)
            || preg_match($intlCompact,  $compact);
    }

    /**
     * Detect contextual phone-number phrases (without actual digits).
     */
    private function detectPhoneContext(string $normalised): bool
    {
        $phrases = [
            // English
            'mobile number', 'phone number', 'contact number',
            'my number', 'cell number', 'my phone', 'call me',
            // Bengali transliterated / common romanised forms
            'mobaile number', 'mobile nambar', 'phone nambar',
            // Bengali unicode
            'মোবাইল নাম্বার', 'মোবাইল নম্বর', 'ফোন নম্বর',
            'কন্ট্যাক্ট নম্বর', 'আমার নম্বর',
        ];

        foreach ($phrases as $phrase) {
            if (mb_strpos($normalised, $phrase, 0, 'UTF-8') !== false) {
                return true;
            }
        }

        return false;
    }

    /* ─────────────────────────────────────────────────────────────────
     | WhatsApp detection
     ───────────────────────────────────────────────────────────────── */

    private function detectWhatsApp(string $normalised): bool
    {
        $keywords = [
            'whatsapp',
            // Bengali unicode
            'হোয়াটসঅ্যাপ',
            'হোয়াটসঅ্যাপে',
            // Common transliterations
            'whatsappe', 'hoatsap', 'hoatsapp',
        ];

        foreach ($keywords as $kw) {
            if (mb_strpos($normalised, $kw, 0, 'UTF-8') !== false) {
                return true;
            }
        }

        return false;
    }

    /* ─────────────────────────────────────────────────────────────────
     | Telegram detection
     ───────────────────────────────────────────────────────────────── */

    private function detectTelegram(string $normalised): bool
    {
        $keywords = [
            'telegram',
            // Bengali unicode
            'টেলিগ্রাম',
            'টেলিগ্রামে',
        ];

        foreach ($keywords as $kw) {
            if (mb_strpos($normalised, $kw, 0, 'UTF-8') !== false) {
                return true;
            }
        }

        return false;
    }

    /* ─────────────────────────────────────────────────────────────────
     | Email detection
     ───────────────────────────────────────────────────────────────── */

    /**
     * Detect an actual email address pattern in the transcript.
     */
    private function detectEmailAddress(string $text): bool
    {
        // Standard email regex (safe, not overcomplicated)
        return (bool) preg_match(
            '/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}/ui',
            $text
        );
    }

    /**
     * Detect contextual email phrases (without an actual address).
     */
    private function detectEmailContext(string $normalised): bool
    {
        $phrases = [
            'email address', 'my email', 'mail address',
            'gmail', 'send me an email', 'email me',
            // Bengali
            'ইমেইল', 'জিমেইল',
        ];

        foreach ($phrases as $phrase) {
            if (mb_strpos($normalised, $phrase, 0, 'UTF-8') !== false) {
                return true;
            }
        }

        return false;
    }

    /* ─────────────────────────────────────────────────────────────────
     | Public interface
     ───────────────────────────────────────────────────────────────── */

    /**
     * Analyse a transcript and return detection results.
     *
     * Detection priority (highest first):
     *   1. phone_number        — actual digits detected
     *   2. email_address       — actual e-mail pattern detected
     *   3. whatsapp            — WhatsApp keyword
     *   4. telegram            — Telegram keyword
     *   5. phone_number_context— contextual phone phrase (no digits)
     *   6. email_context       — contextual email phrase (no address)
     */
    public function analyse(string $transcript): array
    {
        $normalised = $this->normalise($transcript);
        $matches    = [];

        // --- Run all detectors ---
        if ($this->detectPhoneNumber($normalised)) {
            $matches[] = 'phone_number';
        }

        if ($this->detectEmailAddress($transcript)) {  // raw transcript keeps @
            $matches[] = 'email_address';
        }

        if ($this->detectWhatsApp($normalised)) {
            $matches[] = 'whatsapp';
        }

        if ($this->detectTelegram($normalised)) {
            $matches[] = 'telegram';
        }

        if ($this->detectPhoneContext($normalised) && !in_array('phone_number', $matches, true)) {
            $matches[] = 'phone_number_context';
        }

        if ($this->detectEmailContext($normalised) && !in_array('email_address', $matches, true)) {
            $matches[] = 'email_context';
        }

        $detected      = !empty($matches);
        $primaryType   = $detected ? $matches[0] : null;
        $category      = $detected ? 'contact_information' : null;

        return [
            'detected'           => $detected,
            'detection_type'     => $primaryType,
            'detection_category' => $category,
            'all_matches'        => $matches,
        ];
    }
}
