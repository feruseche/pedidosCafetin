<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table='productos';
    protected $primaryKey='id_producto';
    protected $fillable=['producto','descripcion','precio','id_categoria'];
    public $timestamp=false;
}
 