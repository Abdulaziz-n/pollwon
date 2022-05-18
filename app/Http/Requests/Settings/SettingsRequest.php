<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'shop' => 'array',
            'office' => 'array',
            'social' => 'array',
            'main_title' => 'array',
            'about_us' => 'array',
            'file' => 'nullable|mimes:pdf,docx,xlsx,csv',
            'file_agreement' => 'nullable|mimes:pdf,docx,xlsx,csv',
        ];
    }
}
