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

Route::get('/', function () {
    return view('inicio.app');
});

Route::get('/productos.producto', function () {
    return view('productos.producto');
});

Route::get('/productos.detalle', function () {
    return view('productos.detalle');
});

/*
Route::get('/vendedores.vendedores', function () {
    return view('vendedores.vendedores');
});
*/

Route::view('/vendedores.vendedores','vendedores.vendedores');

Route::view('/login','auth.login');

Route::get('/categorias.categoria','CategoriasController@index');

Route::name('detalle')->get('/productos.producto.{id}', 'ProductosController@show');

Route::name('articulo')->get('/productos.detalle.{id}', 'ProductosController@show_articulo');

Route::get('/clientes.clientes','ClientesController@index');

Route::get('/vendedores.vendedores','VendedoresController@index');

Route::view('/insertar.categoria','insertar.categoria.create');

Route::get('/insertar.producto','ProductosController@create');

Route::view('/insertar.cliente','insertar.cliente.create');

Route::name('nuevacategoria')->post('insertar.categoria','CategoriasController@postInsert');

Route::name('nuevoproducto')->post('insertar.producto','ProductosController@postInsert');

Route::name('nuevocliente')->post('insertar.cliente','ClientesController@postInsert');

Route::get('/clientes.filtro','ClientesController@filtro');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
