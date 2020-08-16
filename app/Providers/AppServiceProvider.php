<?php

namespace App\Providers;

use App\Models\Carrito;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Esto lo que hace es crear el carrito de compras y guardarlo en las sessiones sin importar cual sea la primera vista que tu veas en nuestra aplicacion. Ademas no permitira saber cuantos productos tenemos en nuestro carrito de compras.

        View::composer('*', function($view){
            $sessionName = 'carrito_id';
            $carrito_id = \Session::get($sessionName);
            //dd($carrito_id);
            //$request->session()->get($sessionName);
            $carrito = Carrito::findOrCreateById($carrito_id);
            //dd($carrito);
            //$request->session()->put($sessionName, $carrito->id);
            \Session::put($sessionName, $carrito->id);
            $view->with('productsCount', $carrito->productoCount());
        });
    }
}
