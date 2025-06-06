<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
{
     /**
     * Autorizar la petición.
     */
    public function authorize(): bool
    {
        // Cambia según tu lógica de permisos
        return true;
    }

    /**
     * Reglas de validación según el método (store o update).
     */
    public function rules(): array
    {
        // Obtener el id del permiso para ignorar en la regla unique (update)
        $permissionId = $this->route('permission') ?? $this->route('id') ?? null;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('permissions', 'name')->ignore($permissionId),
            ],
        ];
    }

    /**
     * Mensajes personalizados (opcional).
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre del permiso es obligatorio.',
            'name.unique' => 'Este nombre de permiso ya está en uso.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
        ];
    }
}
