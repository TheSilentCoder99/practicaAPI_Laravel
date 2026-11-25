<?php

namespace App\Http\Requests;

use App\Models\Academy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {

      // Cuando tu ruta tiene un parámetro de ruta —por ejemplo PUT/PATCH /api/academies/{academy}— Laravel enlaza automáticamente el modelo si usas Route Model Binding (o deja el ID/valor en la ruta). Desde dentro del FormRequest, puedes acceder a ese parámetro con $this->route('academy'). O sea, puedo acceder al parámetro buscado así:
    // $academy = $this->route('academy');

        $academy = $this->route('academy');

        if (! $academy instanceof Academy || ! $this->user()) {
            return false;
        }

        // solo permito actualizar una academia al dueño de la misma
        return $academy->user_id === $this->user()->id;
    }

    public function rules(): array
    {
        $academy = $this->route('academy');
        $academyId = $academy instanceof Academy ? $academy->id : $academy;

        return [
            'name' => ['required', 'string', 'max:150'],
            'description' => ['required','nullable', 'string', 'max:2000'],
            'address' => ['string', 'max:255'],
            'phone' => ['string', 'max:20'],
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('academies', 'email')->ignore($academyId),
            ],
        ];
    }
}