<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class Pasajero extends Model
{
    use HasEvents;
    protected $fillable =['id'];
    public function autobus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Autobus::class, 'idautobus');
    }
    public function venta(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Venta::class,'idventa');
    }

}
