<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\tikect;
use App\detalle_tikect;

class TicketController extends Controller
{
	public function index(Request $request)
    {

		if ($request)
		        {
		            
		            $productos=DB::table('tikect as t')
		            ->join('tikect_detalle as d','t.id_tikect','=','d.id_tiket')
		            ->join('productos as p','p.id_producto','=','d.id_producto')
			        ->select('p.producto','d.precio','d.cantidad')    
			        ->orderBy('d.id_detalle','asc')
			       	->get();
			    
			        return view('/insertar.ticket',["productos"=>$productos]);
		        }

    }
   
    public function postInsert(Request $r)
    {

		tikect::insert(['id_vendedor'=>0,'id_cliente'=>0,'status'=> 0]);
		detalle_tikect::insert(['id_tikect'=>0,'id_producto'=>$r->id_producto,'precio'=>$r->precio,'cantidad'=>$r->cantidad,'estatus'=>0]);
         	
    }
}
