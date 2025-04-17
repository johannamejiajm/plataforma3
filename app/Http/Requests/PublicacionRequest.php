<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PublicacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cambia a true si el usuario autenticado puede hacer esta acción
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
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'idtipo' => 'required|exists:tipopublicaciones,id',
            'fechainicial' => 'required|date',
            'fechafinal' => 'required|date|after_or_equal:fechainicial',
            'estado' => 'required|in:0,1',
            'imagenes' => 'nullable|array|max:5',
            'imagenes.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Esto devuelve un JSON de errores si falla la validación
      /*   throw new HttpResponseException(response()->json([
            'message' => 'Errores de validación',
            'errors' => $validator->errors()
        ], 422)); */

        return response()->json([
            'message' => 'Errores de validación',
            'errors' => $validator->errors()
        ],422);
    }
}
