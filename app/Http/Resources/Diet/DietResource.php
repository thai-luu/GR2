<?php

namespace App\Http\Resources\Diet;

use Illuminate\Http\Resources\Json\JsonResource;

class DietResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'protein' => $this->protein,
            'cenluloza' => $this->cenluloza,
            'carb' => $this->carb,
            'fat' => $this->fat,
            'range' => $this->range,
            'trans' => $this->trans,
            'mode_target' => $this->whenLoaded('modeTarget'),
        ];
    }
}
