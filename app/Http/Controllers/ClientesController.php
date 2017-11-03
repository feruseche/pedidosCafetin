<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

use App\Cliente;

class ClientesController extends Controller
{
    //
  public function __construct()
    {

    }

  public function index(Request $request)
    {

		if ($request)
		        {
		            $query=trim($request->get('searchText'));
		            $clientes=DB::table('clientes')
			            ->orderBy('cliente','asc')
			            ->paginate(10);

			        $nr=$clientes->count();

			        return view('clientes.clientes',["clientes"=>$clientes,"searchText"=>$query,"nr"=>$nr]);
		        }

    }


 public function filtro(Request $request)
    {

		if ($request)
		        {
		            $query=trim($request->get('searchText'));
		            $clientes=DB::table('clientes')
						      ->where('cliente','LIKE','%'.$query.'%')
                  ->orWhere('cedula','LIKE','%'.$query.'%')
			            ->orderBy('cliente','asc')
			            ->paginate(500);

			        $nr=$clientes->count();

			        return view('clientes.clientes',["clientes"=>$clientes,"searchText"=>$query,"nr"=>$nr]);
		        }


    }   

 public function create(){

        return view("insertar.cliente.create");
    }

    public function postInsert(Request $r){

        cliente::insert(['cliente'=>$r->nombrecliente,
                          'cedula'=>$r->cedulacliente,
                          'clave'=>$r->clavecliente,
                          'ubicacion'=>$r->ubicacion,
                          'celular'=>$r->celular
                        ]);
        $clientes=DB::table('clientes')
                        ->orderBy('id_cliente','asc')
                        ->paginate(1500);
                    
                    $nr=$clientes->count();

                    return back();
        
    }


}
