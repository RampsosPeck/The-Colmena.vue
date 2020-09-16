<?php

namespace App\Http\Controllers\API;

use App\Events\NotismsCreated;
use App\Http\Controllers\Controller;
use App\Http\Resources\PedidoResource;
use App\Http\Resources\ProductoResource;
use App\Http\Resources\UserResource;
use App\Models\Carrito;
use App\Models\Mensaje;
use App\Models\Producto;
use App\User;
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

    public function delivery()
    {
        //return 'estas aqui';
        $userdel = User::where('tipo','Delivery')->get();
        return UserResource::collection($userdel);//new ;
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
        $carrito = Carrito::where('id', $id)->first();
        //return $carrito;
        Carrito::where('id', $id)->update(['estado' => 'procesando']);

        $mensaje = Mensaje::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $carrito->user_id,
            'body' => 'Tú pedido con la orden #'.$carrito->id.'-'.$carrito->user_id.' fué APROBADO; Ahora se está proccesando, te volveremos a informar cuando se envíe el pedido a tú destino. Gracias...'
        ]);

        event(new NotismsCreated($mensaje));

        return response()->json(['message' => 'Tú pedido fue aprobado!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrito = Carrito::where('id', $id)->first();
        Carrito::where('id', $id)
              ->update(['estado' => 'rechazado']);

        $mensaje = Mensaje::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $carrito->user_id,
            'body' => 'Tú pedido con la orden #'.$carrito->id.'-'.$carrito->user_id.' fué RECHAZADO; Vuelva a intentarlo por favor. Gracias...'
        ]);
        event(new NotismsCreated($mensaje));

        return response()->json(['message' => 'Tú pedido fue rechazado!'], 200);
    }

    public function processando(Request $request, $id)
    {
        //return $request->nomdelivery;
        $carrito = Carrito::where('id', $id)->first();
        Carrito::where('id', $id)
              ->update([
                'estado' => 'enviado',
                'nomdelivery' => $request->nomdelivery
            ]);

        if($request->nomdelivery){
            $delivery = $request->nomdelivery;
        }else{
            $delivery = 'movil';
        }

        $mensaje = Mensaje::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $carrito->user_id,
            'body' => 'Tú pedido con la orden #'.$carrito->id.'-'.$carrito->user_id.' fué ENVIADO, al delivery '.$delivery.'. En unos momentos estará en su domicilio. Gracias...'
        ]);
        event(new NotismsCreated($mensaje));

        return response()->json(['message' => 'Pedido enviado...!'], 200);
    }

    public function entregado($id)
    {
        $carrito = Carrito::where('id', $id)->first();
        Carrito::where('id', $id)
              ->update(['estado' => 'entregado']);

        $mensaje = Mensaje::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $carrito->user_id,
            'body' => 'Tú pedido con la orden #'.$carrito->id.'-'.$carrito->user_id.' fué ENTREGADO con exito!, Gracias por su compra... Vuelva pronto :)'
        ]);
        event(new NotismsCreated($mensaje));

        return response()->json(['message' => 'Pedido entregado!'], 200);
    }

    public function rechazo($id)
    {
        $carrito = Carrito::where('id', $id)->first();
        Carrito::where('id', $id)
              ->update(['estado' => 'procesando']);

        $mensaje = Mensaje::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $carrito->user_id,
            'body' => 'Tú pedido con la orden #'.$carrito->id.'-'.$carrito->user_id.' fué APROBADO con exito!, Ahora se está proccesando, te volveremos a informar cuando se envíe el pedido a tú destino. Gracias...'
        ]);
        event(new NotismsCreated($mensaje));

        return response()->json(['message' => 'Pedido APROBADO.'], 200);
    }
}
