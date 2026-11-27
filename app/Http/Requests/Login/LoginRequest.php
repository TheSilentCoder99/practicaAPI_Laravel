<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // cualquiera puede intentar loguearse
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Las validaciones de este request son similares a los de RegisterRequest

            'email' => ['required', 'string', 'email', 'max:255'],
            // Para esta práctica dejo que se pueda usar una contraseña simple pero se podrían agregar muchas otras reglas típicas para una contraseña segura. No hasheo la contraseña porque ya se hashea directamente en el modelo. Si lo haces, en ciertas ocasiones, se puede romper el hash.

            'password' => [
                'required',
                'string',
                Password::min(8),
            ],
        ];
    }
}
