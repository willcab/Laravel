<?php

namespace App\Observers;

use App\Venta;

class VentaObserver
{
    /**
     * Handle the venta "created" event.
     *
     * @param  \App\Venta  $venta
     * @return void
     */
    public function created(Venta $venta)
    {
        $venta->costofinal=$venta->costoc-$venta->descuento;
        $venta->save();

    }
    /**
     * Handle the venta "updated" event.
     *
     * @param  \App\Venta  $venta
     * @return void
     */
    public function updated(Venta $venta)
    {
       $venta->costofinal=$venta->costoc-$venta->descuento;
        $venta->save();
    }

}
