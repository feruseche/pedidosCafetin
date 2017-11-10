<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table='ticket';
    protected $primaryKey='id_ticket';
    protected $fillable=['id_vendedor','id_cliente','status'];
    public $timestamp=false;
}
