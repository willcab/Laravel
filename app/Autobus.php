<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
/**
 * @mixin Builder
 */
class Autobus extends Model
{
    public function pasajeros()
    {
        return $this->hasMany(Pasajero::class);
    }
    public function ventas(){
        return $this->belongsTo(Venta::class);
    }
}
