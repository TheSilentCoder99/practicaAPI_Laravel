<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    // asignación masiva permitida
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'capacity',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    // Un determinado curso pertenece únicamente a una academia, no puede pertenecer a dos
    public function academy(): BelongsTo
    {
        return $this->belongsTo(Academy::class);
    }

    // Un curso puede pertenecer a muchos estudiantes, o sea que del otro lado, del lado de estudiantes, diremos que a un estudiante le pertenecen muchos cursos, es decir que puede estar matriculado en más de uno.
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)
            ->withPivot('enrolled_at')
            ->withTimestamps();
    }
}