<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

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
			        
			        //consulta en formato eloquent.
			        //$consulta=Pacientes::orwhere('paciente','LIKE','%'.$query.'%')->orwhere('cedula','LIKE','%'.$query.'%')->orderBy('historia','asc')->paginate(2); 
			        

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
			            ->orderBy('cliente','asc')
			            ->paginate(500);

			        $nr=$clientes->count();

			        return view('clientes.clientes',["clientes"=>$clientes,"searchText"=>$query,"nr"=>$nr]);
		        }

    }    
}
