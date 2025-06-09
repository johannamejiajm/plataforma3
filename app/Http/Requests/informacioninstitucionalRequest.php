<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformacionInstitucionalRequest extends FormRequest
{



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
            'idtipo' => 'required|string|max:50',
            'contenido' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'idtipo.required' => 'El tipo es obligatorio.',
            'idtipo.string' => 'El tipo debe ser una cadena de texto.',
            'idtipo.max' => 'El tipo no puede tener más de 50 caracteres.',

            'contenido.required' => 'El contenido es obligatorio.',
            'contenido.string' => 'El contenido debe ser una cadena de texto.',

            'foto.image' => 'La foto debe ser una imagen válida.',
            'foto.mimes' => 'La foto debe ser un archivo con formato jpeg, png, jpg o gif.',
            'foto.max' => 'La foto no debe pesar más de 2MB.',

        ];
    }
}
