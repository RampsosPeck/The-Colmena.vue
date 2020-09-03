<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoResource;
use App\Models\Categoria;
use App\Models\Prodetalle;
use App\Models\Producto;
use App\Models\ProductoFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['store','show','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::latest()->paginate(30);
        return ProductoResource::collection($productos);
    }

    public function tortas()
    {
        $tortas = Categoria::where('nombre','Tortas')->first();
        $protortas = Producto::where('categoria_id',$tortas->id)->get();
        return ProductoResource::collection($protortas);
    }

    public function comidas()
    {
        $comidas = Categoria::where('nombre','Comidas')->first();
        $procomi = Producto::where('categoria_id',$comidas->id)->get();
        return ProductoResource::collection($procomi);
    }

    public function almuerzo()
    {
        $prodetalle = Prodetalle::where('estado',1)->first();
        $procomi = Producto::where('id',$prodetalle->producto_id)->get();
        return ProductoResource::collection($procomi);
    }

    public function varios()
    {
        $varios = Categoria::where('nombre','Varios')->first();
        $prova = Producto::where('categoria_id',$varios->id)->get();
        return ProductoResource::collection($prova);
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
            'nombre' => ['required', 'string', 'max:255','unique:productos,nombre'],
            'descripcion' => ['required', 'string', 'max:255'],
            //'precio' => 'required|regex:/^[1-9][0-9]+$///i|not_in:0',
            'precio' => 'required|numeric|not_in:0',
            'stock' => 'required|min:1',
            //'foto' => 'required',
            'categoria' => 'required',
        ]);

         /*if($request['descuento'] && $request['actides'])
         {
            $ofer = 'Hay un descuento de '.(($request['precio']*$request['descuento'])/100).' Bs. Apartir de :'.$request['actides'].' unidades.';
         }else{
            $ofer = 'Sin descuento';
         }*/

         $producto = new Producto;
         $producto->nombre = $request['nombre'];
         $producto->slug = Str::of($request['nombre'])->slug('-');
         //$producto->codigo = date('h:m:s').'/'.date('Y-M-d').'/'.auth()->user()->id;
         $producto->codigo = 'PRO/'.$request['categoria'].'/'.date('M').'/'.date('h:m:s').'/'.auth()->user()->id;
         $producto->descripcion = $request['descripcion'];
         $producto->descuento = $request['descuento'];
         $producto->actides = $request['actides'];
         $producto->precio = $request['precio'];
         $producto->stock = $request['stock'];
         $producto->cant_personas = $request['cant_personas'];
         $producto->oferta = $request['oferta'];
         $producto->estado = true;
         $producto->categoria_id = $request['categoria'];
         $producto->save();

         if($request->foto){
            $name = time().'.'.explode('/',explode(':',substr($request->foto, 0, strpos($request->foto, ';')))[1])[1];
            \Image::make($request->foto)->save(public_path('img/producto/').$name);
            $profoto = new ProductoFoto;
            $profoto->imagen = $name;
            $profoto->producto_id = $producto->id;
            $profoto->save();
        }

        if($request['segundo']){
            $prodetalle = new Prodetalle;
            $prodetalle->entrada = $request['entrada'];
            $prodetalle->sopa = $request['sopa'];
            $prodetalle->segundo = $request['segundo'];
            $prodetalle->postre = $request['postre'];
            $prodetalle->refresco = $request['refresco'];
            $prodetalle->especificacion = $request['especificacion'];
            $prodetalle->producto_id = $producto->id;
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
        $this->authorize('isSadmin');

        Producto::where('id', $id)
              ->update(['estado' => 1]);

        return response()->json(['message' => 'Producto Activado'], 200);
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
        $producto = Producto::findOrFail($id);
        $prodetalle = Prodetalle::where('producto_id',$producto->id)->first();

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:255','unique:productos,nombre,'.$producto->id],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => 'required',
            'stock' => 'required|min:1',
            'categoria' => 'required',
        ]);

        $fotopro = ProductoFoto::where('producto_id',$producto->id)->first();
        if($fotopro){
            $fotoActual = $fotopro->imagen;
            if($request->foto != $fotoActual)
            {
                $name = time().'.'.explode('/',explode(':',substr($request->foto, 0, strpos($request->foto, ';')))[1])[1];

                \Image::make($request->foto)->save(public_path('img/producto/').$name);

                $request->merge(['foto' => $name]);

                //Aqui encuentro la imagen en esa carpeta para borrarla
                $proPhoto = public_path('img/producto/').$fotoActual;
                if( file_exists($proPhoto) )
                {
                    @unlink($proPhoto);
                }
                $fotopro->imagen = $name;
                $fotopro->save();

            }
        }
         /*if($request['descuento'] && $request['actides'])
         {
            $ofer = 'Hay un descuento de '.(($request['precio']*$request['descuento'])/100).' Bs. Apartir de :'.$request['actides'].' unidades.';
            $request->merge(['oferta' => $ofer]);
         }else{
            $request->merge(['oferta' => 'Sin descuento']);
         }*/
        Producto::where('id', $id)
              ->update(['categoria_id' => $request->categoria]);
        $producto->update($request->all());

        if($prodetalle){
            $prodetalle->entrada = $request['entrada'];
            $prodetalle->sopa = $request['sopa'];
            $prodetalle->segundo = $request['segundo'];
            $prodetalle->postre = $request['postre'];
            $prodetalle->refresco = $request['refresco'];
            $prodetalle->save();
        }
        if($request['segundo']){
            $prodetalle = new Prodetalle;
            $prodetalle->entrada = $request['entrada'];
            $prodetalle->sopa = $request['sopa'];
            $prodetalle->segundo = $request['segundo'];
            $prodetalle->postre = $request['postre'];
            $prodetalle->refresco = $request['refresco'];
            $prodetalle->especificacion = $request['especificacion'];
            $prodetalle->producto_id = $producto->id;
            $prodetalle->save();
        }

        return ['message'=> "Success producto actualizado"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isSadmin');

        Producto::where('id', $id)
              ->update(['estado' => 0]);

        return response()->json(['message' => 'Producto dado de baja'], 200);
    }
}
