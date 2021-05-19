<?php
namespace App\Services;
use App\Venta;
class Costo{
    public function get($id){
        $costo=Venta::where('idpasajero',$id)->get();
        if($costo->count()!=0){
            return $costo[0]->costofinal;
        }
    }
}
