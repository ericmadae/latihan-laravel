<?php

namespace App\Providers;

use Google\Client;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

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
        // Gate::define('access-kasir', function (User $user) {
        //     return $user->role == 'admin';
        // });

        // Gate::define('access-manager', function (User $user) {
        //     return $user->role == 'manager';
        // });

        // Event::listen('test.event', function ($event) {
        //     sleep(30);
        //     info($event);
        // });

        // VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        //     return (new MailMessage)
        //         ->subject('Verifikasi email')
        //         ->line("Good Morning")
        //         ->line('Click the button below to verify your email address.')
        //         ->action('Verify Email Address', $url);
        // });
    }

}
