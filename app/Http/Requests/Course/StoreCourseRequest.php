<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Un usuario solo podrá crear cursos dentro de las academias que le pertenezcan

        // Uso la academia que se busca a través del binding, contenida en la ruta
        $academy = $this->route('academy');

        // Compruebo si el usuario inició sesión y si la academia es suya
        return ((Auth::check()) && ($this->user()->id === $academy->user_id));
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
        'description' => ['required','nullable', 'string', 'max:2000'],
        'start_date' => ['required', 'date'],
        'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        'capacity' => ['required', 'integer', 'min:3'],
    ];
}
}
