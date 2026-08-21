<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.layout', function ($view) {
            $user = Auth::user();

            if ($user instanceof User) {
                $view->with([
                    'notifications' => $user->notifications()->latest()->take(10)->get(),
                    'unreadCount'   => $user->unreadNotifications->count(),
                ]);
            } else {
                $view->with([
                    'notifications' => collect(),
                    'unreadCount'   => 0,
                ]);
            }
        });
    }
}
