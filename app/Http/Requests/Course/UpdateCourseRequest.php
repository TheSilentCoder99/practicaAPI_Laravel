<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => ['string', 'max:150'],
        'description' => ['nullable', 'string', 'max:2000'],
        'start_date' => ['date'],
        'end_date' => ['date','after_or_equal:start_date'],
        'capacity' => ['integer', 'min:3'],
    ];
    }
}
