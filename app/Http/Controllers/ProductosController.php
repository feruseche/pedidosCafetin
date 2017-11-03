<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Producto;

use App\Categorias;

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

    public function create(){

        $categorias = Categorias::all();
        return view('insertar.producto.create',['categorias'=>$categorias]);
    }

    public function postInsert(Request $r){

        producto::insert(['producto'=>$r->nombreproducto,
                          'descripcion'=>$r->describeproducto,
                          'precio'=>$r->precioproducto,
                          'id_categoria'=>$r->categoria
                        ]);

        return back();
        
    }


}
