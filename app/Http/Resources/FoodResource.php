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
            'calcium' => $this->calcium,
            'sodium' => $this->sodium,
            'cholesteron' => $this->cholesteron,
            'classify_id' => $this->classify_id,
            'calo' => $this->calo,
            'serving' => 0,
            'classify' => $this->whenLoaded('classify'),
            'trans' => $this->trans,
        ];
    }
}
