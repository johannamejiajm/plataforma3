<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonacionRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',

            'apellido' => 'required|string|max:255',

            'donacion' => 'required|integer|digits_between:1,15',

            'telefono' => 'required|integer|digits_between:1,15',

            'email' => 'required|email|unique:users,email',

            'soporte' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',



        ];
    }



    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre es obligatorio.',

            'apellido.required' => 'El apellido es obligatorio.',

            'donacion.required' => 'El campo donación es obligatorio.',
            'donacion.integer' => 'La donación debe ser un número entero.',
            'donacion.digits_between' => 'La donación debe tener entre 1 y 15 dígitos.',

            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.integer' => 'Ingresa un número de teléfono válido.',
            'telefono.digits_between' => 'El número de teléfono debe tener entre 1 y 15 dígitos.',

            'email.required' => 'Es obligatorio ingresar un email.',
            'email.email' => 'El formato del email no es válido.',
            'email.unique' => 'Este email ya está registrado.',

        ];
    }
}
