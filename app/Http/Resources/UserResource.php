<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'name' => $this->name,
            'physical' => $this->whenLoaded('physicalCondition') ?? '',
            'mode' => $this->whenLoaded('mode') ?? '',
            'age' => $this->age,
            'weight' => $this->weight,
            'height' => $this->height,
            'permissions' => $this->whenLoaded('permissions') ?? '',
            'level_id' => $this->whenLoaded('level') ?? '',
            'target_id' => $this->whenLoaded('target') ?? '',
            'wrist' => $this->wrist,
            'sex' => $this->sex,
            'deleted_at' => $this->deleted_at
        ];
    }
}
