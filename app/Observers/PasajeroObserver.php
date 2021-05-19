<?php

namespace App\Observers;

use App\Pasajero;
use App\Venta;

class PasajeroObserver
{
    /**
     * Handle the pasajero "updated" event.
     *
     * @param  \App\Pasajero  $pasajero
     * @return void
     */
    public function updated (Pasajero $pasajero)
    {

        if($pasajero->descuento!=0){
            $venta=Venta::where('idpasajero',$pasajero->id)->first();
            $venta->descuento=100;
            $venta->save();
        }else{
            $venta=Venta::where('idpasajero',$pasajero->id)->first();
            $venta->descuento=0;
            $venta->save();
        }
    }

    /**
     * Handle the pasajero "force deleted" event.
     *
     * @param  \App\Pasajero  $pasajero
     * @return void
     */
    public function created(Pasajero $pasajero)
    {

        $venta=new Venta;
        if($pasajero->descuento!=0){

            $venta->idpasajero=$pasajero->id;
            $venta->idautobus=$pasajero->idautobus;
            $venta->descuento=100;
            $venta->costoc=(220*1.6);
            $venta->save();
            var_dump("$venta->costofinal=$venta->costoc-$venta->descuento");
        }else{
            $venta->idpasajero=$pasajero->id;
            $venta->idautobus=$pasajero->idautobus;
            $venta->costoc=(220*1.6);
            $venta->save();
            var_dump("$venta->costofinal=$venta->costoc-$venta->descuento");
        }
    }
}
