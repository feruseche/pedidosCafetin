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

Route::get('/categorias.categoria', function () {
    return view('categorias.categoria');
});

Route::get('/productos.producto', function () {
    return view('productos.producto');
});

Route::get('/productos.detalle', function () {
    return view('productos.detalle');
});

Route::get('/vendedores.vendedores', function () {
    return view('vendedores.vendedores');
});

Route::get('/clientes.clientes', function () {
    return view('clientes.clientes');
});
Route::get('/dispositivos.dispositivos', function () {
    return view('dispositivos.dispositivos');
});