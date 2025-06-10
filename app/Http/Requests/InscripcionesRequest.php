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
                'email' => 'nullable|email',
                'telefono' => 'nullable|string|max:20',
                'imagen' => 'nullable|image|max:2048',
                'descripcion' => 'nullable|string',
                'estado' => 'required|in:1,0', 
        ];
    }
    public function messages(): array
    {
        return [
        'email.required' => 'El correo es obligatorio.',
                'email.email' => 'El correo debe tener la siguiente estructura ejemplo@ejem.ejem.',
                'email.unique' => 'El correo ya existe.',
                'descripcion.required' => 'La descripción es obligatoria.',
                'descripcion.string' => 'La descripción debe ser texto.',
                'descripcion.max' => 'La descripción no puede ser mayor a :max caracteres.',
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.string' => 'El nombre debe ser texto.',
                'idevento.required' => 'El evento es obligatorio.',
                'identidad.required' => 'El numero de identidad es obligatorio.',
                'identidad.required' => 'El campo número de identidad es obligatorio.',
                'identidad.unique' => 'Este número de identidad ya está registrado.',
                'identidad.max' => 'El número de identidad no debe tener más de 20 caracteres.',
                'imagen.max' => 'El campo de imagen no debe ser mayor a 2048 kilobytes.',
        ];        
    }


}
