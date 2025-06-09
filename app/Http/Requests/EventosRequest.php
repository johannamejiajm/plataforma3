<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosRequest extends FormRequest
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
            'evento' => 'required|string|max:255',
            'fechainicial' => 'required|date|before_or_equal:fechafinal',
            'fechafinal' => 'required|date|after_or_equal:fechainicial',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'evento.required' => 'El nombre del evento es obligatorio.',
            'evento.string' => 'Debes ingresar un nombre de evento válido.',
            'evento.max' => 'El nombre del evento no puede superar los 255 caracteres.',

            'fechainicial.required' => 'La fecha inicial es obligatoria.',
            'fechainicial.date' => 'Debes ingresar una fecha inicial válida.',
            'fechainicial.before_or_equal' => 'La fecha inicial no puede ser posterior a la fecha final.',

            'fechafinal.required' => 'La fecha final es obligatoria.',
            'fechafinal.date' => 'Debes ingresar una fecha final válida.',
            'fechafinal.after_or_equal' => 'La fecha final no puede ser anterior a la fecha inicial.',

            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de tipo: jpg, jpeg, png, gif o webp.',
            'imagen.max' => 'La imagen no debe superar los 2MB de tamaño.',
        ];
    }
}
