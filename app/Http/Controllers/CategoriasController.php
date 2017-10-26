<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CategoriasController extends Controller
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
		            $categorias=DB::table('categorias')
			            ->orderBy('id_categoria','asc')
			            ->paginate(100);
			        
			        $nr=$categorias->count();

			        return view('categorias.categoria',["categorias"=>$categorias,"searchText"=>$query,"nr"=>$nr]);
		        }

    }
    
}
