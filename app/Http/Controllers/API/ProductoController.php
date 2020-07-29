<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::latest()->paginate(10);
        return ProductoResource::collection($productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => 'required|regex:/^[1-9][0-9]+$/i|not_in:0',
            'stock' => 'required|min:1',
            'categoria' => 'required',
        ]);

         $producto = new Producto;
         $producto->nombre = $request['nombre'];
         $producto->slug = Str::of($request['nombre'])->slug('-');
         $producto->codigo = $producto->id.'/'.date('Y-M-d h:m').'/'.auth()->user()->id;
         $producto->descripcion = $request['descripcion'];
         $producto->descuento = $request['descuento'];
         $producto->precio = $request['precio'];
         $producto->stock = $request['stock'];
         $producto->cant_personas = $request['cant_personas'];
         $producto->oferta = $request['oferta'];
         $producto->estado = true;
         $producto->categoria_id = $request['categoria'];
         $producto->save();

         if($request['segundo']){
            $prodetalle = new Prodetalle;
            $prodetalle->entrada = $request['entrada'];
            $prodetalle->sopa = $request['sopa'];
            $prodetalle->segundo = $request['segundo'];
            $prodetalle->postre = $request['postre'];
            $prodetalle->refresco = $request['refresco'];
            $prodetalle->especificacion = $request['especificacion'];
            $prodetalle->save();
         }

          return ['message'=> "Success OK producto..."];
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
        //
    }
}
