<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Ticket;
use App\DetalleTicket;
use Auth;

class PedidosController extends Controller
{
     public function index()
    {
      
      $user=Auth::user()->id;

      $pedidos=DB::table('ticket as t')
              ->leftjoin('clientes','clientes.id_cliente','=','t.id_cliente')
              ->select('t.id_ticket','clientes.id_cliente','clientes.cliente','clientes.ubicacion','clientes.celular')   
              ->where('t.id_vendedor','=',$user) 
              ->where ('t.status','=',1)
              ->orderBy('t.id_ticket','asc') 
              ->paginate(1000);

      $detalle = DB::raw("(SELECT id_ticket, sum(precio*cantidad) AS total FROM ticket_detalle WHERE status=1 GROUP BY id_ticket) as detalles");

      $totales = DB::table('ticket')
                ->select('ticket.id_ticket','ticket.id_vendedor','ticket.id_cliente','clientes.cliente','detalles.total','clientes.ubicacion')
                ->leftJoin($detalle, 'detalles.id_ticket', '=', 'ticket.id_ticket')
                ->join('clientes','clientes.id_cliente','=','ticket.id_cliente')
                ->where('ticket.id_vendedor', '=', $user)
                ->where('ticket.status', '=', 1)                
                ->get();

      $nr=$pedidos->count();

      //dd($corteHoy);

      return view('pedidos.pedido',["pedidos"=>$pedidos,"nr"=>$nr,'totales'=>$totales]);

    }
    public function detalle($id)
    {
      $user=Auth::user()->id;

      $cliente=DB::table('ticket as t')
                  ->join('clientes as c','c.id_cliente','=','t.id_cliente')
                  ->select('t.id_ticket','c.id_cliente','c.cliente','c.ubicacion','c.celular')   
                  ->where('t.id_ticket','=',$id)
                  ->get();


      $pedidos=DB::table('ticket_detalle as d')
                  ->join('productos as p','p.id_producto','=','d.id_producto')
                  ->select('d.id_detalle','d.id_ticket','p.producto','d.precio','d.cantidad')   
                  ->where('d.id_ticket','=',$id)
                  ->where('d.status','=',1)
                  ->get();

      $np = $pedidos->count();

      return view('pedidos.detalle',["pedidos"=>$pedidos,"cliente"=>$cliente,'nt'=>$id,'nprod'=>$np]);

    }

   public function detalleCobrado($id)
    {

      $user=Auth::user()->id;

      $cliente=DB::table('ticket as t')
                  ->join('clientes as c','c.id_cliente','=','t.id_cliente')
                  ->select('t.id_ticket','c.id_cliente','c.cliente','c.ubicacion','c.celular')   
                  ->where('t.id_ticket','=',$id)
                  ->get();


      $pedidos=DB::table('ticket_detalle as d')
                  ->join('productos as p','p.id_producto','=','d.id_producto')
                  ->select('d.id_detalle','d.id_ticket','p.producto','d.precio','d.cantidad')   
                  ->where('d.id_ticket','=',$id)
                  ->where('d.status','=',1)
                  ->get();

      $np = $pedidos->count();

      return view('pedidos.detalleCobrar',["pedidos"=>$pedidos,"cliente"=>$cliente,'nt'=>$id,'nprod'=>$np]);

    }

    public function entregapedido($id){

    	$ticket=Ticket::find($id);
    	$ticket->status=2;
    	$ticket->update(); 
    	 
      return Redirect::to('pedidos.pedido');

    }

    public function elimina($id){

      $ticket=Ticket::find($id);
      $ticket->status=4;
      $ticket->update(); 

      return redirect::to('pedidos.pedido');

    }


  public function elideta($id){

      $dticket=DetalleTicket::find($id);
      $dticket->status=0;
      $idt=$dticket->id_ticket;
      $dticket->update(); 


       return redirect()->route('detalle-ticket',['id'=>$idt]);
    
     
    }


  public function filtroporcobrar(){

    $user=Auth::user()->id;

    $detalle = DB::raw("(SELECT id_ticket, sum(precio*cantidad) AS total FROM ticket_detalle WHERE status=1 GROUP BY id_ticket) as detalles");

    $pedidos = DB::table('ticket')
              ->select('ticket.id_ticket','ticket.id_vendedor','ticket.id_cliente','clientes.cliente','detalles.total','clientes.ubicacion')
              ->leftJoin($detalle, 'detalles.id_ticket', '=', 'ticket.id_ticket')
              ->join('clientes','clientes.id_cliente','=','ticket.id_cliente')

              ->where('ticket.id_vendedor', '=', $user)
              ->where('ticket.status', '=', 2)
              ->get();

    $nr=$pedidos->count();
    
    return view('pedidos.porcobrar',["pedidos"=>$pedidos,"nr"=>$nr]);

}


  public function pedidopagado($id){

    $dticket=Ticket::find($id);
    $dticket->status=3;
    $dticket->update(); 

    return Redirect('pedidos.porcobrar');

  }

  
  public function corte(){

    $corteHoy = getdate();
    $user=Auth::user()->id;

    $resumen = DB::table('ticket')
             ->select(DB::raw('count(*) as user_count, status'))
             ->where('id_vendedor', '=', $user)
             ->groupBy('status')
             ->get();

   // agrupar por estatus
    
    $detalle1 = DB::raw("(SELECT id_ticket, sum(precio *cantidad) AS total FROM ticket_detalle WHERE status='1' GROUP BY id_ticket) as detalles");
  
    $cobrado = DB::table('ticket')
              ->select('ticket.id_ticket','detalles.total','ticket.status')
              ->leftJoin($detalle1, 'detalles.id_ticket', '=', 'ticket.id_ticket')
              ->where('ticket.id_vendedor', '=', $user)
              ->get();

    //dd();
    
    $nr=$cobrado->count();
    
    return view('pedidos.corte',["resumen"=>$resumen,"cobrado"=>$cobrado,"nr"=>$nr]);
  
  }


}
