<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tikect extends Model
{
    protected $table='tikect';
    protected $primaryKey='id_tikect';
    protected $fillable='id_vendedor','id_cliente','estatus';
    public $timestamp=false;
}
