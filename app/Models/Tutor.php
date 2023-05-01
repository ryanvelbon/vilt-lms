<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'bio',
        'pic',
        'website'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
}
