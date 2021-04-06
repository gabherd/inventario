<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeasureRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
             'measure' => ['required']
        ];
    }

    public function messages(){
        return [
            'measure.required' => 'La medida es requerida',
        ];
    }
}
