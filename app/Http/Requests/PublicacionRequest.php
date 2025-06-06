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
        $rules =  [
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'idtipo' => 'required|exists:tipopublicaciones,id',
            'fechainicial' => 'required|date',
            'fechafinal' => 'required|date|after_or_equal:fechainicial',
            'estado' => 'required|in:0,1',
            'imagenes' => 'nullable|array|max:5',
            'imagenes.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];


        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $publicacion = $this->route('publicaciones'); // <-- accede al modelo inyectado en la ruta

            if ($publicacion) {

                $rules['titulo'] = 'required|string|max:255|unique:publicaciones,titulo,' . $publicacion->id;
            }
        }

        return $rules;
    }

    public function  messages(): array
    {

        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no puede tener más de 255 caracteres.',
            'contenido.required' => 'El contenido no puede estar vacío.',
            'idtipo.required' => 'Debe seleccionar un tipo de publicación.',
            'idtipo.exists' => 'El tipo de publicación seleccionado no es válido.',
            'fechainicial.required' => 'Debe indicar una fecha de inicio.',
            'fechainicial.date' => 'La fecha de inicio no es válida.',
            'fechafinal.required' => 'Debe indicar una fecha de fin.',
            'fechafinal.date' => 'La fecha de fin no es válida.',
            'fechafinal.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'estado.required' => 'Debe seleccionar el estado.',
            'estado.in' => 'El estado debe ser 0 (inactivo) o 1 (activo).',
            'imagenes.array' => 'Las imágenes deben estar en un arreglo.',
            'imagenes.max' => 'No se pueden subir más de 5 imágenes.',
            'imagenes.*.image' => 'Cada archivo debe ser una imagen válida.',
            'imagenes.*.mimes' => 'Las imágenes deben estar en formato JPG, JPEG, PNG o WEBP.',
            'imagenes.*.max' => 'Cada imagen debe pesar como máximo 2 MB.'
        ];
    }

      protected function failedValidation(Validator $validator)
        {
            throw new HttpResponseException(response()->json([
                'message' => 'Errores de validación',
                'errors' => $validator->errors()
            ], 422));
        }
}
