<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
            'model' => 'required|string',
            'horizontal' => 'nullable|boolean',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,webp'
        ];
    }
}
