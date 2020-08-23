<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/completo', function () {
    return view('layouts.completo');
});

Auth::routes();

Route::get('/catalogo', 'AdminController@index')->name('catalogo');
Route::get('/dashboard', 'HomeController@index')->name('home');

//Route::get('/carrito', 'API/CarritoController@index')->name('shopping_cart.show');


Route::resource('/producto_detalles',"API\CarritoDetalleController", ["only"=>["store","destroy"]]);

Route::get('{path}',"HomeController@index")->where('path','[\/\w\.-]*');