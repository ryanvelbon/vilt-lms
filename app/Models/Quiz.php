<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'duration',
        'level',
        'status',
        'tutor_id',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class, 'quiz_questions')->distinct();
    }
}
