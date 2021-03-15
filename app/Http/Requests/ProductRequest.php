<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
       return [
            'id'=>'required',
            'measure'=>'required',
            'model'=>'required',
            'brand'=>'required',
            'price'=>'required',
            'stock'=>'required'
        ];
    }

    public function messages(){
        return [
            'id.required'      => 'El id es obligatorio',
            'measure.required' => 'Ingresa la medida',
            'model.required'   => 'Ingresa el modelo',
            'brand.required'   => 'Ingresa la marca',
            'price.required'   => 'Ingresa el precio',
            'stock.required'   => 'Ingresa la cantidad',
        ];
    }
}
