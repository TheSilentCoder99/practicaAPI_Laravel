<?php

namespace App\Http\Requests;

use App\Models\Academy;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   public function authorize()
{

    // Permito la creación de una nueva academia solo si el usuario ha iniciado sesión
    return Auth::check();
    
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:150'],
        'description' => ['nullable', 'string', 'max:2000'],
        'address' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'string', 'max:20'],
        'email' => ['required', 'string', 'email', 'max:255','unique:academies,email'],
    ];
}
}
