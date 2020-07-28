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



// Route group for authenticated users only
Route::group(['middleware' => ['auth:api']], function(){

	Route::apiResources(['users' => 'API\UserController']);
	Route::get('profile','API\UserController@profile');
	Route::get('findUser','API\UserController@search');
	Route::put('profile','API\UserController@updateProfile');

	Route::apiResources(['categorias' => 'API\CategoriaController']);
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



