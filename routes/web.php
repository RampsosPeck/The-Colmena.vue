<?php

use App\Events\WebsocketDemoEvent;
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
	//broadcast(new WebsocketDemoEvent('some data'));
    return view('welcome');
});
Route::get('/completo', function () {
	//broadcast(new WebsocketDemoEvent('some data'));
    return view('layouts.completo');
});

Auth::routes();

Route::get('/catalogo', 'AdminController@index')->name('catalogo');
Route::get('/dashboard', 'HomeController@index')->name('home');


Route::get('/carripro', 'API\CarritoController@index')->name('shopping_cart.show');
Route::delete('/carripro/{id}', 'API\CarritoController@destroy')->name('shopping_cart.delete');
Route::post('/carriproductos','API\CarritoController@store')->name('shopping_cart.update');
Route::post('/infoperson','API\CarritoController@infoperson')->name('shopping_cart.info');

Route::resource('/producto_detalles',"API\CarritoDetalleController", ["only"=>["store","destroy"]]);

Route::get('profotodel/{id}',"API\ProductoController@fotodel");
Route::get('profotofavo/{id}',"API\ProductoController@fotofavo");

Route::get('{path}',"HomeController@index")->where('path','[\/\w\.-]*');