<?php

namespace App\Http\Resources\TrainingSession;

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
            'sets' => json_decode($this->pivot->sets, true),
            'time' => $this->pivot->time,
            'category' => $this->whenLoaded('exerciseCategory'),
            'level_id' => $this->level_id
        ];
    }
}
