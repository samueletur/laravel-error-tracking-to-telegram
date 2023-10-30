<?php

namespace Samueletur\LaravelErrorTrackingToTelegram;

use Illuminate\Support\ServiceProvider;

class LaravelErrorTrackingToTelegramServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // publish the configuration, if requested
        $this->publishes([
            __DIR__ . '/../config/error_tracking_telegram.php' => config_path('error_tracking_telegram.php'),
        ], 'error_tracking_telegram_config');

        // merge the published configuration with the package default one
        $this->mergeConfigFrom(__DIR__ . '/../config/error_tracking_telegram.php', 'error_tracking_telegram');
    }

    public function register()
    {
        $this->app->singleton(LaravelErrorTrackingToTelegram::class, function () {
            return new LaravelErrorTrackingToTelegram();
        });
    }
}
