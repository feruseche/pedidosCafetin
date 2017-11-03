<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Categorias;

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
    public function lista(Request $request)
    {
    	if ($request)
		        {
		            $query="";//trim($request->get('searchText'));
		            $categorias=DB::table('categorias')
		            	->where('categorias.categoria','like','%'.$query.'%')
			            ->orderBy('id_categoria','asc')
			            ->paginate(5);
			       return view('insertar.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
		        }
   }

    public function create(){

        return view("insertar.categoria.create");
    }

    public function postInsert(Request $r){

		categorias::insert(['categoria'=>$r->nombrecategoria]);
		$categorias=DB::table('categorias')
			            ->orderBy('id_categoria','asc')
			            ->paginate(100);
			        
			        $nr=$categorias->count();

			        return back();
    	
    }
}
