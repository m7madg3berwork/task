<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DecryptRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'required|file',
            'name' => 'required|string|regex:/^[a-zA-Z\-\_]+$/u',
            'path' => 'required|string|regex:/^[a-zA-Z\-\_\/]+$/u',
        ];
    }
}