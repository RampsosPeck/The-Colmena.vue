<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CarritoDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;
use SweetAlert;
class CarritoDetalleController extends Controller
{
    public function __construct(){
        $this->middleware('carrito');
    }

    public function store(Request $request)
    {
        //var_dump($request->all());
        $producto = Producto::find($request->producto_id);
        $cant = $request->cantidad * $producto->precio;
        //dd($producto);

        $carritodetalles = CarritoDetalle::create([
            'carrito_id'     => $request->carrito->id,
            'producto_id'    => $producto->id,
            'cantidad'       => $request->cantidad,
            'producto_precio'=> $producto->precio,
            'subtotal_bs'    => $cant
        ]);

        if($carritodetalles){
            alert()->success('Puedes verlo en tu carrito de compras.', 'Producto agregado.')->persistent('Ok');
            return redirect()->back();
        }
        alert()->error('Algo paso..!', 'Opss.. error!');
        return redirect()->back()->withErrors(['producto'=>'No se pudo agregar el producto']);
    }


    public function destroy($id)
    {
        //
    }
}
