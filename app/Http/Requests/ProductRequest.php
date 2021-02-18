<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'id'=>'required',
            'measure'=>'required',
            'model'=>'required',
            'brand'=>'required',
            'price'=>'required',
            'stock'=>'required'
        ];
    }

    public function message(){
        return [
            'id.required' => 'El id es obligatorio',
            'measure.required' => 'Ingresa la medida',
            'model.required' => 'Ingresa el modelo',
            'brand.required' => 'Ingresa la marca',
            'price.required' => 'Ingresa el precio',
            'stock.required' => 'Ingresa la cantidad',
        ];
    }
}
