<?php

namespace App\Http\Resources\Lesson;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonEditResource extends JsonResource
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
            'note' => $this->note,
            'mode_id' => $this->whenLoaded('mode')->pluck('id'),
            'target_id' => $this->whenLoaded('target')->pluck('id'),
            'trainingSessions' => $this->whenLoaded('trainingSession')->pluck('id')
        ];
    }
}