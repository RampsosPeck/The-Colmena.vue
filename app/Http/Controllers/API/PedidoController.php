<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PedidoResource;
use App\Http\Resources\ProductoResource;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carritos = Carrito::where('estado','recibido')->orderBy('id','ASC')->get();
        return PedidoResource::collection($carritos);
    }

    public function aceptado()
    {
        $carritos = Carrito::where('estado','procesando')->orderBy('id','ASC')->get();
        return PedidoResource::collection($carritos);
    }

    public function enviados()
    {
        $carritos = Carrito::where('estado','enviado')->orderBy('id','ASC')->get();
        return PedidoResource::collection($carritos);
    }
    public function rechazados()
    {
        $carritos = Carrito::where('estado','rechazado')->orderBy('id','ASC')->get();
        return PedidoResource::collection($carritos);
    }
    public function vendidos()
    {
        $carritos = Carrito::where('estado','entregado')->orderBy('id','ASC')->get();
        return PedidoResource::collection($carritos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return new ProductoResource($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Carrito::where('id', $id)
              ->update(['estado' => 'procesando']);

        return response()->json(['message' => 'Carrito aprobado'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carrito::where('id', $id)
              ->update(['estado' => 'rechazado']);

        return response()->json(['message' => 'Carrito rechazado'], 200);
    }

    public function processando($id)
    {
        Carrito::where('id', $id)
              ->update(['estado' => 'enviado']);

        return response()->json(['message' => 'Carrito enviado'], 200);
    }

    public function enviado($id)
    {
        Carrito::where('id', $id)
              ->update(['estado' => 'entregado']);

        return response()->json(['message' => 'Carrito entregado'], 200);
    }

    public function rechazo($id)
    {
        Carrito::where('id', $id)
              ->update(['estado' => 'procesando']);

        return response()->json(['message' => 'Carrito aceptado'], 200);
    }
}
