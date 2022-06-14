<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        return [
            'title' => 'array',
            'title.*' => 'string',
            'models_count' => 'array',
            'category_id' => 'integer',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp'
        ];
    }
}
