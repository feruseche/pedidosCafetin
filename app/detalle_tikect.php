<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_tikect extends Model
{
     protected $table='tikect_detalle';
    protected $primaryKey='id_detalle';
    protected $fillable='id_producto','precio','cantidad','estatus';
    public $timestamp=false;
}
