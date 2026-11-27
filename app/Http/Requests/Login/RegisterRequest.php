<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

// Las clases que van dentro de Request básicamente son como un baúl de reglas para un determinado método de cada controlador. Es decir, no puedes hacer una request para dos métodos diferentes porque normalmente van a validar cosas diferentes.
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // cualquiera puede registrarse
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Este es el método que contiene las reglas. Solamente debes devolver el array con las características a validar y las reglas que éstas deben respetar.
        return [
            'name' => ['required', 'string', 'max:100'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],

            // Para esta práctica dejo que se pueda usar una contraseña simple pero se podrían agregar muchas otras reglas típicas para una contraseña segura. No hasheo la contraseña porque ya se hashea directamente en el modelo. Si lo haces, en ciertas ocasiones, se puede romper el hash.
            'password' => [
                'required',
                'string',
                Password::min(8)
            ],
        ];
    }
}
