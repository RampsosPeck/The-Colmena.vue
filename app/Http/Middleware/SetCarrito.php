<?php

namespace App\Http\Middleware;

use App\Models\Carrito;
use Closure;

class SetCarrito
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sessionName = 'carrito_id';
        $carrito_id = \Session::get($sessionName);
        //dd($carrito_id);
        //$request->session()->get($sessionName);
        $carrito = Carrito::findOrCreateById($carrito_id);
        //dd($carrito);
        //$request->session()->put($sessionName, $carrito->id);
        \Session::put($sessionName, $carrito->id);

        $request->carrito = $carrito;

        return $next($request);
    }
}
