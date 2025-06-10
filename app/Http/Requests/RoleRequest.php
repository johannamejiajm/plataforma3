<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
   /**
     * Determina si el usuario está autorizado para hacer esta petición.
     */
    public function authorize(): bool
    {
        // Cambia esto según tu lógica de permisos
        return true;
    }

    /**
     * Obtiene las reglas de validación que aplican a la petición.
     */
    public function rules(): array
    {
        // Obtenemos el id del rol en caso de update (route model binding o parámetro)
        $roleId = $this->route('role') ?? $this->route('id') ?? null;

        return [
            'name' => [
                'required',
                // Unique en tabla roles, ignorando el actual en caso de update
                Rule::unique('roles', 'name')->ignore($roleId),
            ],
            // Para permisos, puede ser nulo o un arreglo
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string'], // Opcional: validar cada permiso como string
        ];
    }

    /**
     * Mensajes personalizados (opcional)
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre del rol es obligatorio.',
            'name.unique' => 'Este nombre de rol ya está en uso.',
            'permissions.array' => 'Los permisos deben enviarse como un arreglo.',
            'permissions.*.string' => 'Cada permiso debe ser un texto válido.',
        ];
    }
}
