<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RUTAS DE INICIO DE SESION Y DE APLICACION GENERAL

Route::get('/', function () {return view('inicio.app');});
Route::view('login','auth.login');
Route::view('register','register');
Auth::routes();


//RUTAS DE PRODUCTOS

Route::get('productos.producto', function () {return view('productos.producto');});
Route::get('productos.detalle', function () {return view('productos.detalle');});
Route::name('detalle')->get('productos.producto.{id}', 'ProductosController@show');
Route::name('articulo')->get('productos.detalle.{id}', 'ProductosController@show_articulo');
Route::get('insertar.producto','ProductosController@create');
Route::name('nuevoproducto')->post('insertar.producto','ProductosController@postInsert');


// RUTAS DE PEDIDOS

Route::get('pedidos.pedido','PedidosController@index');
Route::get('pedidos.pedido-elimina.{id}','PedidosController@elimina');
Route::get('pedidos.eliminadetalle.{id}','PedidosController@elideta');
Route::get('pedidos.pedido-despacho.{id}','PedidosController@entregapedido');
route::get('pedidos.porcobrar','PedidosController@filtroporcobrar');
Route::get('pedidos.pedido-pagado.{id}','PedidosController@pedidopagado');
route::get('pedidos.corte','PedidosController@corte');
Route::get('pedido.abierto','TicketController@ticketAbierto');


// RUTAS DE TICKETS

Route::name('nuevoticket')->post('insertar.ticket.index', 'TicketController@postInsert');
Route::get('insertar.ticket', function () { return view('insertar.ticket.index'); }); 
Route::name('ticket-cliente')->get('insertar.ticket-cliente.{id}','TicketController@cliente');
Route::name('cerrar-ticket')->get('insertar.cerrar-ticket.{id}','TicketController@cerrarticket');
Route::name('detalle-ticket')->get('pedidos.detalle.{id}','PedidosController@detalle');


//RUTAS DE VENDEDORES/USUARIOS

Route::view('vendedores.vendedores','vendedores.vendedores');
Route::get('vendedores.vendedores','VendedoresController@index');
Route::get('vendedores.filtro','VendedoresController@filtro');


//RUTAS DE CATEGORIAS

Route::get('categorias.categoria','CategoriasController@index');
Route::view('insertar.categoria','insertar.categoria.create');
Route::name('nuevacategoria')->post('insertar.categoria','CategoriasController@postInsert');



//RUTAS DE CLIENTES

Route::get('clientes.index','ClientesController@index');
Route::view('insertar.cliente','insertar.cliente.create');
Route::name('nuevocliente')->post('insertar.cliente','ClientesController@postInsert');
Route::get('clientes.filtro','ClientesController@filtro');



