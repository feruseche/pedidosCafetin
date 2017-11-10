<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Ticket;
use App\User;
use App\Cliente;
use App\Categorias;
use Auth; 
use App\DetalleTicket;

class TicketController extends Controller
{
	
	public function index(Request $request)
    {

		$user=Auth::user()->id;
		           
		$productos=DB::table('ticket as t')
						->join('ticket_detalle as d','t.id_ticket','=','d.id_ticket')
						->join('productos as p','p.id_producto','=','d.id_producto')
						->select('t.id_ticket','d.id_detalle','p.producto','d.precio','d.cantidad')   
						->where('t.id_vendedor','=',$user) 
						->where('t.status','=',0)
						->orderBy('d.id_detalle','asc')
						->paginate(100);

		$clientes=Cliente::where('id_cliente',1)->get();

		return view('insertar.ticket.index',["productos"=>$productos,"clientes"=>$cliente]);
		    
    }
   
    public function postInsert(Request $r){
    	
    		$user=Auth::user()->id;
		
			$num_ticket=DB::table('ticket')
							->where('id_vendedor','=',$user)
							->where('status','=',0)
							->select('id_ticket')
							->orderBy('id_ticket','desc')
							->get();

			$nr=$num_ticket->count();
			
			foreach ($num_ticket as $tn){

				$nt=$tn->id_ticket;

			}
			
			$clientes=Cliente::where('id_cliente',1)->get();
		
			if($nr==0){
			
				Ticket::insert(['id_vendedor'=>$user,'id_cliente'=>1,'status'=> 0]);

				$num_ticket=DB::table('ticket')
								->where('id_vendedor','=',$user)
								->where('status','=',0)
								->select('id_ticket')
								->orderBy('id_ticket','desc')
								->get();

				$nr=$num_ticket->count();
				
				foreach ($num_ticket as $tn){

					$nt=$tn->id_ticket;

				}				
				
				$clientes=Cliente::where('id_cliente',1)->get();

				DetalleTicket::insert(['id_ticket'=>$nt,'id_producto'=>$r->id_producto,'precio'=>$r->precio,'cantidad'=>$r->cantidad]);
				   			
	   			$productos=DB::table('ticket as t')
					            ->join('ticket_detalle as d','t.id_ticket','=','d.id_ticket')
					            ->join('productos as p','p.id_producto','=','d.id_producto')
						        ->select('t.id_ticket','d.id_detalle','p.producto','d.precio','d.cantidad')   
						        ->where('t.id_vendedor','=',$user) 
						        ->where('t.status','=',0)
						        ->orderBy('d.id_detalle','asc') 
								->paginate(100);
	   			 
	   			return view('insertar.ticket.index',["productos"=>$productos,"clientes"=>$clientes,"nt"=>$nt]);
					
			}else{
						
				$num_ticket=DB::table('ticket')
								->where('id_vendedor','=',$user)
								->where('status','=',0)
								->select('id_ticket','id_cliente')
								->orderBy('id_ticket','desc')
								->get();

				foreach ($num_ticket as $tn){
					
					$nt=$tn->id_ticket;
					$idc=$tn->id_cliente;
				
				}

				$clientes=Cliente::where('id_cliente',$idc)->get();

				DetalleTicket::insert(['id_ticket'=>$nt,'id_producto'=>$r->id_producto,'precio'=>$r->precio,'cantidad'=>$r->cantidad]);
				   			
	   			$productos=DB::table('ticket as t')
					            ->join('ticket_detalle as d','t.id_ticket','=','d.id_ticket')
					            ->join('productos as p','p.id_producto','=','d.id_producto')
						        ->select('t.id_ticket','d.id_detalle','p.producto','d.precio','d.cantidad')   
						        ->where('t.id_vendedor','=',$user) 
						        ->where('t.status','=',0)
						        ->orderBy('d.id_detalle','asc') 
						 		->paginate(10);
						
				return view('insertar.ticket.index',["productos"=>$productos,"clientes"=>$clientes,"nt"=>$nt]);

			}
    }

    function cerrarticket($id){

    	$ticket=Ticket::find($id);
    	$ticket->status=1;
    	$ticket->update(); 
    	$categorias=Categorias::all();
		$nr=$categorias->count();
		$query="";
    	
    	return view('categorias.categoria',["categorias"=>$categorias,"searchText"=>$query,"nr"=>$nr]);
 
    }
    public function cliente($idcliente)
    {
    	$user=Auth::user()->id;
		//busco el ticket
		$num_ticket=DB::table('ticket')
						->where('id_vendedor','=',$user)
						->where('status','=',0)
						->select('id_ticket')
						->orderBy('id_ticket','desc')
						->get();

		foreach ($num_ticket as $tn) {

			$nt=$tn->id_ticket;

			}

		$ticket=Ticket::find($nt);
    	$ticket->id_cliente=$idcliente;
    	$ticket->update(); 
		           
		$clientes=Cliente::where('id_cliente',$idcliente)->get();
		$productos=DB::table('ticket as t')
						->join('ticket_detalle as d','t.id_ticket','=','d.id_ticket')
						->join('productos as p','p.id_producto','=','d.id_producto')
						->select('t.id_ticket','d.id_detalle','p.producto','d.precio','d.cantidad','t.id_cliente')   
						->where('t.id_vendedor','=',$user) 
						->where('t.status','=',0)
						->orderBy('d.id_detalle','asc') 
						->paginate(10);

		return view('insertar.ticket.index',["productos"=>$productos,"clientes"=>$clientes,"nt"=>$nt]);
		    
    }

    public function ticketAbierto(){

		$user=Auth::user()->id;
		$num_ticket=DB::table('ticket')
						->where('id_vendedor','=',$user)
						->where('status','=',0)
						->select('id_ticket','id_cliente')
						->orderBy('id_ticket','desc')
						->get();

		$nr=$num_ticket->count();

		foreach ($num_ticket as $tn){
			
			$nt=$tn->id_ticket;
			$idc=$tn->id_cliente;
		
		}
		
		if($nr>0){

			$clientes=Cliente::where('id_cliente',$idc)->get();
			   			
			$productos=DB::table('ticket as t')
			            ->join('ticket_detalle as d','t.id_ticket','=','d.id_ticket')
			            ->join('productos as p','p.id_producto','=','d.id_producto')
				        ->select('t.id_ticket','d.id_detalle','p.producto','d.precio','d.cantidad')   
				        ->where('t.id_vendedor','=',$user) 
				        ->where('t.status','=',0)
				        ->orderBy('d.id_detalle','asc') 
				 		->paginate(10);
					
			return view('insertar.ticket.index',["productos"=>$productos,"clientes"=>$clientes,"nt"=>$nt]);
		
		}else{


			$categorias=Categorias::all();

			return view('categorias.categoria',['categorias'=>$categorias]);

		}


	}

 
}
