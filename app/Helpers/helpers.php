<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

// Mentor Helper Function
if (!function_exists('isMentor')) {
    function isMentor()
    {
        return Auth::check() && Auth::user()->role === UserRole::Mentor;
    }
}

// Student Helper Function
if (!function_exists('isStudent')) {
    function isStudent()
    {
        return Auth::check() && Auth::user()->role === UserRole::Student;
    }
}

if (!function_exists('media_url')) {
    /** Works for new Cloudinary URLs and old local storage paths. */
    function media_url(?string $value): ?string
    {
        if (!$value) {
            return null;
        }

        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }
}
