<?php

namespace App\Http\Resources\Mode;

use Illuminate\Http\Resources\Json\JsonResource;

class ModeLessonResource extends JsonResource
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
            'lessons' => $this->whenLoaded('lesson')
        ];
    }
}
