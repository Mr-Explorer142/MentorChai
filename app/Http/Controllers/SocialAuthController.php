<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Supported OAuth providers.
     */
    private const SUPPORTED_PROVIDERS = ['google', 'github'];

    /**
     * Redirect the user to the OAuth provider's login page.
     *
     * The intended role (student|mentor|login) is stored in the session so the
     * callback can assign it after the OAuth round-trip completes.
     *
     * @param  string  $provider  'google' or 'github'
     * @param  string  $role      'student', 'mentor', or 'login' (login-only, no registration)
     */
    public function redirect(string $provider, string $role): RedirectResponse
    {
        // Guard: only allow known providers
        if (! in_array($provider, self::SUPPORTED_PROVIDERS, true)) {
            abort(404);
        }

        // Guard: only allow known roles/intents
        if (! in_array($role, ['student', 'mentor', 'login'], true)) {
            abort(404);
        }

        // Persist role/intent across the OAuth round-trip
        session(['oauth_intended_role' => $role]);

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle the OAuth provider callback.
     *
     * Edge cases handled:
     * - Provider returns no email        → redirect back with error
     * - Login intent + user not found    → redirect to register page with hint
     * - Email already registered via a different provider → friendly error
     * - Returning user (same provider_id) → log in without creating duplicate
     * - Brand-new user                   → create User + Profile, mark email as verified
     *
     * @param  string  $provider  'google' or 'github'
     */
    public function callback(string $provider): RedirectResponse
    {
        // Guard: only allow known providers
        if (! in_array($provider, self::SUPPORTED_PROVIDERS, true)) {
            abort(404);
        }

        // Retrieve the intended role/intent (defaults to 'student' as a safe fallback)
        $intendedRole = session()->pull('oauth_intended_role', 'student');

        // Validate value just in case the session was tampered with
        if (! in_array($intendedRole, ['student', 'mentor', 'login'], true)) {
            $intendedRole = 'student';
        }

        $isLoginOnly = ($intendedRole === 'login');

        // Fetch user data from the OAuth provider
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Throwable $e) {
            $errorRoute = $isLoginOnly ? 'login' : ($intendedRole === 'mentor' ? 'teacher_register' : 'student_register');
            return redirect()
                ->route($errorRoute)
                ->withErrors(['social' => 'Social login cancelled. Please try again.']);
        }

        // Edge case: provider returned no email (GitHub with private email)
        if (empty($socialUser->getEmail())) {
            $errorRoute = $isLoginOnly ? 'login' : ($intendedRole === 'mentor' ? 'teacher_register' : 'student_register');
            return redirect()
                ->route($errorRoute)
                ->withErrors(['social' => 'No email found from your ' . ucfirst($provider) . ' account. Please add a public email to your profile.']);
        }

        $email      = $socialUser->getEmail();
        $providerId = $socialUser->getId();
        $name       = $socialUser->getName() ?? $socialUser->getNickname() ?? 'User';

        // 1) Look for an existing account with the same provider + provider_id
        $user = User::where('provider', $provider)
                    ->where('provider_id', $providerId)
                    ->first();

        if ($user) {
            // Safety check: if email was not verified (e.g., due to previous mass assignment bug), verify it now
            if (is_null($user->email_verified_at)) {
                $user->update(['email_verified_at' => now()]);
            }
            // Returning social user — just log them in
            Auth::login($user, true);
            return $this->redirectToDashboard($user);
        }

        // 2) Check if the email is already registered (possibly via another provider or password)
        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            if ($existingUser->provider && $existingUser->provider !== $provider) {
                // Registered via a different social provider
                $errorRoute = $isLoginOnly ? 'login' : ($intendedRole === 'mentor' ? 'teacher_register' : 'student_register');
                return redirect()->route($errorRoute)->withErrors([
                    'social' => 'An account is already registered with this email via ' . ucfirst($existingUser->provider) . '.',
                ]);
            }

            // Registered via email/password — offer to log in normally
            return redirect()->route('login')->withErrors([
                'email' => 'This email address is already registered. Please log in with your password.',
            ]);
        }

        // 3) Login-only intent but no account found — send to register
        if ($isLoginOnly) {
            return redirect()->route('student_register')->withErrors([
                'social' => 'No registration found for ' . ucfirst($provider) . ' account. Please register below.',
            ]);
        }

        // 4) Create a brand-new user
        $user = User::create([
            'name'              => $name,
            'email'             => $email,
            'password'          => null,          // OAuth users have no password
            'role'              => $intendedRole,
            'provider'          => $provider,
            'provider_id'       => $providerId,
            'email_verified_at' => now(),          // OAuth email is already verified
        ]);

        // Create an empty profile for the new user
        $user->profile()->create([
            'bio' => null,
        ]);

        Auth::login($user, true);

        return $this->redirectToDashboard($user);
    }

    /**
     * Redirect the authenticated user to their role-appropriate dashboard.
     */
    private function redirectToDashboard(User $user): RedirectResponse
    {
        if ($user->role === UserRole::Mentor) {
            return redirect()->route('mentor_dashboard');
        }

        return redirect()->route('student_dashboard');
    }
}
