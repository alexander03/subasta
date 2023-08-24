<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BienResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ['id' => $this->id,
            'situacion' => $this->situacion,
            'valorreferencia' => $this->valorreferencia,
            'proceso_id' => $this->proceso_id,
            'proceso' => new ProcesoResource($this->proceso),
            'producto_id' => $this->producto_id,
            'producto' => new ProductoResource($this->producto),
        ];
    }
}
