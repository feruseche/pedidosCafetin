<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    //


 public function filtro($id_categoria)
    {

       $productos=DB::table('productos')
		->where('id_categoria','=',$id_categoria)
		->orderBy('id_productos','asc')
        ->paginate(100);

        $nr=$productos->count();

        return view('productos.productos',["productos"=>$productos,"nr"=>$nr]);

    }


    public function show($id)
    {

	    $productos=DB::table('productos')
		->where('id_categoria','=',$id)
		->orderBy('id_producto','asc')
        ->paginate(100);

        $nr=$productos->count();

        return view('productos.producto',["productos"=>$productos,"nr"=>$nr]);   
       
    }

    public function show_articulo($id)
    {

        $productos=DB::table('productos')
        ->where('id_producto','=',$id)
        ->orderBy('id_producto','asc')
        ->get();

        return view('productos.detalle',["productos"=>$productos]);   
       
    }

}
