<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use HasFactory;
    // asignación masiva permitida
    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',
        'email',
    ];

    // Una academia pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Una academia tiene ninguno, uno o muchos cursos
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
