<?php
namespace App\Services;

use App\Autobus;
class Rutas{
    public function get(): array
    {
        $rutas=Autobus::get();
        $rutasArray['']='Seleccione alguna Ruta';
        foreach ($rutas as $ruta){
            $rutasArray[$ruta->id]=$ruta->ruta;
        }
        return $rutasArray;
    }
}
