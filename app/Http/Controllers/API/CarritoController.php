<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarritoResource;
use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

        //$dato =  $request[0];
        //return  response()->json($dato['cantidad']);
        //$result = CarritoDetalle::where('id',$dato['id'])->first();
        //return  $result->cantidad;
        //return $request->all();

        $carri = Carrito::where('id',$request->carrito->id)->first();

        $detalles = $request->all();
        foreach($detalles as $detalle)
        {
            //$cadetalles = CarritoDetalle::where('id',$detalle['id'])->first();
            $cadetalles = CarritoDetalle::find($detalle['id']);
            $cadetalles->cantidad = $detalle['cantidad'];
            $cadetalles->descuento_bs = $detalle['descuento_bs'];
            $cadetalles->subtotal_bs  = $detalle['subtotal_bs'];
            $cadetalles->save();
        }


        Carrito::where('id',$request->carrito->id)->update([
                'codigo'   => 'CO/'.date('M').'/'.date('h:m:s').'/'.$carri->id,
                'total_bs' => $carri->carrito_detalles()->sum('subtotal_bs')
            ]);

        return ['message'=> "Se actualizó tu carrito."];
    }

    public function infoperson(Request $request)
    {
        //return $request->all();
        $antuser = User::where('celular',$request->celular)->first();
        //return $antuser;
        if($antuser){
            $antuser->update($request->all());
            $carri = Carrito::where('id',$request->carrito->id)->first();
            //return $carri;
            Carrito::where('id',$request->carrito->id)->update([
                'codigo'      => 'CO/'.date('M').'/'.date('h:m:s').'/'.$carri->id,
                'user_id'     => $antuser->id,
                'fecha_orden' => Carbon::now(),
                'estado'      => 'recibido',
                'delivery'    => $request->delivery,
                'especificacion' => $request->especificacion
            ]);
            //$message = 'Usuario actualizado correctamente.';
            $request->session()->flush();
        }else{
            $userid = \DB::table('users')->insertGetId([
                'slug' => Str::of($request->fullname)->slug('-'),
                'fullname' => $request->fullname,
                'celular'  => $request->celular,
                'direccion'=> $request->direccion,
                'lat'      => $request->lat,
                'lng'      => $request->lng,
                'password' => Hash::make($request->celular)
            ]);
            $carri = Carrito::where('id',$request->carrito->id)->first();
            Carrito::where('id',$request->carrito->id)->update([
                'codigo'   => 'CO/'.date('M').'/'.date('h:m:s').'/'.$carri->id,
                'user_id'  => $userid,
                'fecha_orden' => Carbon::now(),
                'estado'      => 'recibido',
                'delivery'    => $request->delivery,
                'especificacion' => $request->especificacion
            ]);
            //$message = 'Usuario creado correctamente.';
            $request->session()->flush();
        }

        //$request->session()->flush();
         return response()->json(['message' => 'Excelente carrito guardado.'], 200);
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
    public function destroy(Request $request, $id)
    {

        CarritoDetalle::where('id', $id)
              ->delete();

        $carri = Carrito::where('id',$request->carrito->id)->first();
        Carrito::where('id',$request->carrito->id)->update([
                'total_bs' => $carri->carrito_detalles()->sum('subtotal_bs')
            ]);

        return response()->json(['message' => 'Producto eliminado.'], 200);
    }
}


