<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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

  
    public function rules()
    {
        return [
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'last_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'email'],
            'userAccess' => ['required', 'regex:(0|1)']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'Correo requerido',
            'userAccess' => 'Permido requerido'
        ];
    }
}
