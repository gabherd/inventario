<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    function rules()
    {
        return [
            'brand' => ['required', 'regex:/^[\pL\s\-]+$/u']
        ];
    }

    public function messages(){
        return [
            'brand.required' => 'El nombre es requerido',
            'brand.regex' => 'Solo letras',
        ];
    }
}
