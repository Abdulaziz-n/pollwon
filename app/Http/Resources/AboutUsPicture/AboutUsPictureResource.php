<?php

namespace App\Http\Resources\AboutUsPicture;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsPictureResource extends JsonResource
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
            'image' => asset($this->image),
            'image_mobile' => asset($this->image_mobile),
            'position' => $this->position
            
        ];
    }
}
