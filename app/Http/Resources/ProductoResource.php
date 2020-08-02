<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoriaResource;
use App\Http\Resources\ProdetalleResource;
use App\Http\Resources\ProductofotoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
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
            'nombre' => $this->nombre,
            'slug' => $this->slug,
            'codigo' => $this->codigo,
            'descripcion' => $this->descripcion,
            'descuento' => $this->descuento,
            'create_dates' => [
                'created_at_human' => $this->created_at->diffForHumans(),
                'created_at' => $this->created_at
            ],
            'precio' => $this->precio,
            'stock' => $this->stock,
            'cant_personas' => $this->cant_personas,
            'oferta' => $this->oferta,
            'estado' => $this->estado,
            'fotos' => ProductofotoResource::collection($this->fotos),
            'categoria' => new CategoriaResource($this->categoria),
            'prodetalle' => new ProdetalleResource($this->prodetalle),
        ];
    }
}
