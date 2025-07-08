<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiarEstadoDonacionesRequest extends FormRequest
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
            'id'     => ['required','integer','exists:donaciones,id'],
            'estado' => ['required','integer','in:1,2'],     // 1=aprobado, 2=denegado
            'soporte'=> ['nullable','file','mimes:jpg,jpeg,png,pdf','max:2048'],
        ];
    }
    
    public function messages(): array
    {
        return [
            'id.required'      => 'El campo ID es obligatorio.',
            'id.integer'       => 'El ID debe ser un número entero.',
            'id.exists'        => 'La donación seleccionada no existe.',
            'estado.required'  => 'El campo estado es obligatorio.',
            'estado.integer'   => 'El estado debe ser un número entero.',
            'estado.in'        => 'El estado seleccionado no es válido.',
            'soporte.file'     => 'El archivo de soporte debe ser un archivo válido.',
            'soporte.mimes'    => 'El archivo de soporte debe ser una imagen JPG, JPEG, PNG o un PDF.',
            'soporte.max'      => 'El archivo de soporte no debe superar los 2MB.',
        ];
    }
}
