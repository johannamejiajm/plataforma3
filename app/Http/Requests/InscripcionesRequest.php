<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscripcionesRequest extends FormRequest
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
            'idevento' => 'required|exists:eventos,id',
                'identidad' => 'required|string|max:20|unique:artistas,identidad',
                'nombre' => 'required|string|max:255',
                'email' => 'required|email',
                'telefono' => 'required|string|max:20',
                'imagen' => 'required|image|max:2048',
                'descripcion' => 'required|string',
                'estado' => 'required|in:1,0', 
        ];
    }
    public function messages(): array
    {
        return [
            'idevento.required' => 'El evento es obligatorio.',
            'idevento.exists' => 'El evento seleccionado no es válido.',
            
            'identidad.required' => 'El número de identidad es obligatorio.',
            'identidad.string' => 'El número de identidad debe ser texto.',
            'identidad.max' => 'El número de identidad no debe tener más de 20 caracteres.',
            'identidad.unique' => 'Este número de identidad ya está registrado.',

            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede ser mayor a 255 caracteres.',

            'email.required' => 'El correo es obligatorio.',
            'email.email' => 'El correo debe tener la siguiente estructura ejemplo@ejem.ejem.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no debe tener más de 20 caracteres.',

            'imagen.required' => 'La imagen es obligatoria.',
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.max' => 'El campo de imagen no debe ser mayor a 2048 kilobytes.',

            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser texto.',

            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
        ];
    }


}
