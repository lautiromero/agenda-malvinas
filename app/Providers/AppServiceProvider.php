<?php

namespace App\Providers;
use Illuminate\Support\Carbon;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            setlocale(LC_TIME, 'es_ES');
            // Configuración para fechas en español
            \Carbon\Carbon::setLocale(config('app.locale'));
            \Illuminate\Support\Carbon::setLocale(config('app.locale'));
    }
}
