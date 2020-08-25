<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarritoResource;
use App\Models\Carrito;
use App\Models\CarritoDetalle;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function __construct(){
        $this->middleware('carrito');
    }

    public function index(Request $request)
    {
        //$sessionName = 'carrito_id';
        //$carrito_id = $request->session()->get($sessionName);
        //var_dump($carrito_id);
        $productos = CarritoDetalle::where('carrito_id',$request->carrito->id)->get();
        return CarritoResource::collection($productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Aqui actualizo la tabla carrito_detalles
        //return $request[0];
        //return (object)$request;
        $objeto = (object) $request;
        var_dump($objeto);
        foreach ($objeto as $animal => $id){
            return ucfirst($animal) . ": " . $id . "<br>";
        }

        $carri = Carrito::where('id',$request->carrito->id)->first();

        /*$detalles = $request;
        foreach($detalles as $detalle){
            CarritoDetalle::where('id',$detalle->id)->where('carrito_id',$carri->id)->update([
                'cantidad'    => $detalle->cantidad,
                'descuento_bs'=> $detalle->descuento_bs,
                'subtotal_bs' => $detalle->subtotal_bs
            ]);
        }*/


        Carrito::where('id',$request->carrito->id)->update([
                'codigo'   => 'CO/'.date('M').'/'.date('h:m:s').'/'.$carri->id,
                'total_bs' => 150
            ]);

        return ['message'=> "Se actualizó tu carrito."];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CarritoDetalle::where('id', $id)
              ->delete();

        return response()->json(['message' => 'Producto eliminado.'], 200);
    }
}
