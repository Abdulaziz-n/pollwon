<?php

namespace App\Http\Resources\ServiceCentre;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceCentreResource extends JsonResource
{
    public static $wrap = false;
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
            'city' => $this->city,
            'address' => $this->address,
            'description' => $this->description
        ];
    }
}
