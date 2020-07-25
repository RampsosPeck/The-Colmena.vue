<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'fullname' => $this->fullname,
            'slug' => $this->slug,
            'celular' => $this->celular,
            $this->mergeWhen(auth()->check() && auth()->id() == $this->id, [
                'email' => $this->email
            ]),
            'email' => $this->email,
            'foto' => $this->foto,
            'create_dates' => [
                'created_at_human' => $this->created_at->diffForHumans(),
                'created_at' => $this->created_at
            ],
            'acerca' => $this->acerca,
            'direccion' => $this->direccion,
            'location' => $this->location
        ];
    }
}
