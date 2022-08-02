<?php

namespace App\Http\Resources\TrainingSession;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TrainingSession\ExerciseResource;

class TrainingSessionResource extends JsonResource
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
            'desc' => $this->desc,
            'name' => $this->name,
            'exercises' => ExerciseResource::collection($this->whenLoaded('exercise'))
        ];
    }
}
