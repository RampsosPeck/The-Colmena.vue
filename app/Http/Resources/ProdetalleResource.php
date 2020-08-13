<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdetalleResource extends JsonResource
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
            'entrada' => $this->entrada,
            'sopa' => $this->sopa,
            'segundo' => $this->segundo,
            'postre' => $this->postre,
            'refresco' => $this->refresco,
            'especificacion' => $this->especificacion,
            'estado' => $this->estado
        ];
    }
}
