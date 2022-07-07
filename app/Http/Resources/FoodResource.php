<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
            'carb' => $this->carb,
            'fat' => $this->fat,
            'cenluloza' => $this->cenluloza,
            'vitaminA' => $this->vitaminA,
            'vitaminB' => $this->vitaminB,
            'natri' => $this->natri,
            'kali' => $this->kali,
            'classify_id' => $this->classify_id,
            'calo' => $this->calo,
            'serving' => 0,
            
        ];
    }
}
