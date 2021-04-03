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
            'nameBrand' => ['required']
        ];
    }

    public function messages(){
        return [
            'nameBrand.required' => 'El nombre es requerido',
        ];
    }
}
