<?php

namespace Samueletur\LaravelErrorTrackingToTelegram;

use Illuminate\Support\ServiceProvider;

class LaravelErrorTrackingToTelegramServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // dd('works');
    }

    public function register()
    {
        $this->app->singleton(LaravelErrorTrackingToTelegram::class, function () {
            return new LaravelErrorTrackingToTelegram();
        });
    }
}
