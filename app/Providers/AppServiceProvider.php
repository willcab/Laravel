<?php

namespace App\Providers;

use App\Observers\PasajeroObserver;
use App\Observers\VentaObserver;
use App\Pasajero;
use App\Venta;
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
        Pasajero::observe(PasajeroObserver::class);
        Venta::observe(VentaObserver::class);
    }
}
