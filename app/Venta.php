<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
/**
 * @mixin Builder
 */

class Venta extends Model
{
    public function Autobuses(){
        return $this->hasMany(Autobus::class);
    }
    public function pasajeros()
    {
        return $this->hasOne(Pasajero::class);
    }
}
