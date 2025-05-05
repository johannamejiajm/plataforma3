<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class Contactosrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'direccion' => 'Required|string',
            'telefono1' => 'required|interger|digits_between:1,15',
            'telefono2' => 'required|interger|digits_between:1,15',
            'email' => 'required|email|unique:users,email',
            'horario' => 'required|string',
            'horarioextras' => 'required|string',
            'urlfacebook' => 'required|string',
            'urlinstagram' => 'required|string',

        ];

       /*  public function messages() {
            return
        } */
    }
}
