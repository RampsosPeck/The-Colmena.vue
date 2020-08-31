<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarritoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'carrito_id' => $this->carrito_id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'producto_precio' => $this->producto_precio,
            'subtotal_bs' => $this->subtotal_bs,
            'descuento_bs' => $this->descuento_bs,
            'producto' => new ProductoResource($this->producto)
        ];
    }
}
