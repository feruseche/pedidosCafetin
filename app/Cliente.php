<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    //
    protected $table='clientes';
    protected $primaryKey='id_cliente';
    protected $fillable=['cliente','cedula','clave','ubicacion','celular'];
    public $timestamp=false;    

}
