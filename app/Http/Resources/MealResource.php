<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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
            'breakfast' => json_decode($this->breakfast),
            'lunch' => json_decode($this->lunch),
            'dinner' => json_decode($this->dinner),
            'snacks' => json_decode($this->snacks),
            'calories' => $this->calories,
            'mode' => $this->mode,
            'user_id' => $this->user_id,
            'day_use' => $this->day_use,
            
        ];
    }
}
