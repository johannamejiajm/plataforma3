<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class Contactosrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'direccion' => 'required|string',
            'telefono1' => 'required|integer|digits_between:1,15',
            'telefono2' => 'required|integer|digits_between:1,15',
            'email' => 'required|email|unique:users,email',
            'horario' => 'required|string',
            'horarioextras' => 'required|string',
            'urlfacebook' => 'required|string',
            'urlinstagram' => 'required|string',

        ];

    }

    public function messages() {

        return [

           'direccion.required' => 'La dirección es obligatoria',
            'direccion.string' => 'Debes ingresar una dirección válida',

            'telefono1.required' => 'El número es obligatorio',
            'telefono1.integer' => 'Ingresa un número de teléfono válido',
            'telefono1.digits_between' => 'El número debe tener entre 1 y 15 dígitos',

            'telefono2.required' => 'El número es obligatorio',
            'telefono2.integer' => 'Ingresa un número de teléfono válido',
            'telefono2.digits_between' => 'El número debe tener entre 1 y 15 dígitos',

            'email.required' => 'Es obligatorio ingresar un email',
            'email.email' => 'El email no es válido',
            'email.unique' => 'Este email ya está registrado',

            'horario.required' => 'El horario es obligatorio',
            'horarioextras.required' => 'El horario extra es obligatorio',
            'urlfacebook.required' => 'La URL de Facebook es obligatoria',
            'urlinstagram.required' => 'La URL de Instagram es obligatoria',
        ];
    }
}


