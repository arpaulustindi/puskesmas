<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Yepsua\Filament\Themes\Facades\FilamentThemes;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        FilamentThemes::register(function($path) {
            // Using Vite:
            return app(\Illuminate\Foundation\Vite::class)('resources/' . $path);
            // Using Mix:
            return app(\Illuminate\Foundation\Mix::class)($path);
            // Using asset()
            return asset($path);
        });
    }
}
