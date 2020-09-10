<?php

/*use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

	Route::apiResources(['categorias' => 'API\CategoriaController']);
	Route::apiResources(['productos' => 'API\ProductoController']);
	Route::get('tortas','API\ProductoController@tortas');
	Route::get('comidas','API\ProductoController@comidas');
	Route::get('almuerzo','API\ProductoController@almuerzo');
	Route::get('tiendas','API\ProductoController@tienda');

	Route::get('viewpro/{slug}', 'API\ProductoController@viewpro');

/*Route::group(['middleware' => ['web']], function () {
	Route::apiResources(['carripro' => 'API\CarritoController']);
});*/
// Route group for authenticated users only
Route::group(['middleware' => ['auth:api']], function(){
	Route::apiResources(['users' => 'API\UserController']);
	Route::get('profile','API\UserController@profile');
	Route::get('findUser','API\UserController@search');
	Route::put('profile','API\UserController@updateProfile');

	Route::apiResources(['pedidos' => 'API\PedidoController']);
	Route::get('aceptados','API\PedidoController@aceptado');
	Route::put('enviados/{id}','API\PedidoController@processando');
	Route::get('enviados','API\PedidoController@enviados');
	Route::get('entregados/{id}','API\PedidoController@enviado');
	Route::get('rechazados','API\PedidoController@rechazados');
	Route::get('rechazados/{id}','API\PedidoController@rechazo');
	Route::get('vendidos','API\PedidoController@vendidos');

	Route::get('actialmuerzo/{id}','API\ProductoController@actialmu');

	Route::get('deliverys','API\PedidoController@delivery');

	Route::get('messages', 'API\ChatsController@fetchMessages');
	Route::post('messages', 'API\ChatsController@sendMessage');
	Route::get('messageuser', 'API\ChatsController@userMessage');
});

// Routes for guests only
Route::group(['middleware' => ['guest:api']], function(){

});
/*
//Public routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('me', 'User\MeController@getMe');

// Route group for authenticated users only
Route::group(['middleware' => ['auth:api']], function(){
	Route::post('logout', 'Auth\LoginController@logout');
	Route::put('settings/profile', 'User\SettingsController@updateProfile');
 	Route::put('settings/password', 'User\SettingsController@updatePassword');

 	//Rutas para categoria
 	Route::get('categorias', 'Producto\CategoriaController@index');
 	Route::post('categoria/register', 'Producto\CategoriaController@store');

 	Route::apiResources(['users' => 'API\UserController']);
});

// Routes for guests only
Route::group(['middleware' => ['guest:api']], function(){
	Route::post('register', 'Auth\RegisterController@register');
	Route::post('verification/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
 	Route::post('verification/resend', 'Auth\VerificationController@resend');
 	Route::post('login', 'Auth\LoginController@login');
 	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
 	Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});



