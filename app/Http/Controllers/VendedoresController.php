<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class VendedoresController extends Controller
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
		            $vendedores=DB::table('vendedores')
			            ->orderBy('vendedor','asc')
			            ->paginate(10);
			        
			        $nr=$vendedores->count();

			        return view('vendedores.vendedores',["vendedores"=>$vendedores,"searchText"=>$query,"nr"=>$nr]);
		        }

    }
    
}
