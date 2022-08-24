<?php

namespace App\Http\Requests\ServiceCentre;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCentreRequest extends FormRequest
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
            'city' => 'array',
            'address' => 'array',
            'description' => 'array'
        ];
    }
}
