<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->isMethod('get')) return [];
        return [
            'title' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg,webp,mp4,ogx,oga,ogv,ogg,webm',
            'image_mobile' => 'nullable|mimes:jpg,png,jpeg,gif,svg,webp,mp4,ogx,oga,ogv,ogg,webm',
            'image1' => 'nullable|mimes:jpg,png,jpeg,gif,svg,webp,mp4,ogx,oga,ogv,ogg,webm',
            'image_mobile1' => 'nullable|mimes:jpg,png,jpeg,gif,svg,webp,mp4,ogx,oga,ogv,ogg,webm',
        ];
    }
}
