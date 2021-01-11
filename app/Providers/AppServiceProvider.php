<?php

namespace App\Providers;

use App\Settings;
use App\Settings_404;
use App\SettingsTranslate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Settings::class, function () {
            return Settings::make(storage_path('app/settings.json'));
        });

//        $this->app->bind(Settings::class, function ($app) {
//            // Pass the application name
//            return new Settings();
//        });

        $this->app->singleton(SettingsTranslate::class, function () {
            return SettingsTranslate::make(storage_path('app/translate.json'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
