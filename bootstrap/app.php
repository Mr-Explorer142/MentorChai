<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
        $middleware->trustHosts(subdomains: true);

        // excluding routes from CSRF
        $middleware->validateCsrfTokens(except: [
            'payment/success',
            'payment/fail',
            'payment/cancel',
            'payment/ipn',
        ]);

        $middleware->append(\App\Http\Middleware\HandleNgrok::class);

        $middleware->appendToGroup('web', [
            \App\Http\Middleware\UpdateLastSeen::class,
        ]);

        $middleware->alias([
            'mentor'       => \App\Http\Middleware\MentorMiddleware::class,
            'student'      => \App\Http\Middleware\StudentMiddleware::class,
            'last_seen_at' => \App\Http\Middleware\UpdateLastSeen::class,
            'admin'        => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Illuminate\Http\Exceptions\PostTooLargeException $e, \Illuminate\Http\Request $request) {
            return back()->withErrors(['error' => 'আপনি যে ছবিগুলো আপলোড করছেন তার মোট সাইজ সার্ভারের সীমার চেয়ে বেশি। দয়া করে ছোট সাইজের ছবি আপলোড করুন অথবা সার্ভারের লিমিট বাড়ান।']);
        });
    })->create();
