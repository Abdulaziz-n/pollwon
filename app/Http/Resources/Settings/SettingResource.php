<?php

namespace App\Http\Resources\Settings;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'shop' => $this->shop,
            'office' => $this->office,
            'social' => $this->social,
            'main_title' => $this->main_title,
            'about_us' => $this->about_us,
            'file' => asset($this->file),

        ];
    }
}
