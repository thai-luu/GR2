<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
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
            'level_id' => $this->whenLoaded('level'),
            'note' => $this->note,
            'compound' => $this->compound == 1 ? true : false ,
            'category' => $this->whenLoaded('exerciseCategory'),
            'muscles' => $this->whenLoaded('muscle'),
            'sets' => [],
            'calories' => $this->calories,
            'linkVd' => $this->linkVd
        ];
    }
}
