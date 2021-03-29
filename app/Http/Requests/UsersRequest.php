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
            'email' => ['required', 'email']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido no seas p...',
            'last_name.required' => 'El apellido tambien',
            'email.required' => 'Eres o te haces',
        ];
    }
}
