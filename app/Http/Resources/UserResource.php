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
            'telephone' => $this->telephone,
            'target_id' => $this->whenLoaded('target') && $this->whenLoaded('target')->id ? $this->whenLoaded('target')->id : '',
            'mode' => $this->whenLoaded('mode') && $this->whenLoaded('mode')->id ? $this->whenLoaded('mode')->id : '',
            'age' => $this->age,
            'weight' => $this->weight,
            'height' => $this->height,
            'permissions' => $this->whenLoaded('permissions') ?? '',
            'level_id' => $this->whenLoaded('level') && $this->whenLoaded('level')->id ? $this->whenLoaded('level')->id : '',
            'wrist' => $this->wrist
        ];
    }
}
