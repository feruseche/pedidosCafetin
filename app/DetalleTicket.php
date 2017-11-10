<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTicket extends Model
{
    protected $table='ticket_detalle';
    protected $primaryKey='id_detalle';
    protected $fillable=['id_producto','precio','cantidad','status'];
    public $timestamp=false;
}
