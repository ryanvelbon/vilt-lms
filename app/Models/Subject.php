<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    public $table = 'subjects';
    
    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'icon',
    ];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function tutors(): BelongsToMany
    {
        return $this->belongsToMany(Tutor::class);
    }

    public function getTopicsTreeAttribute()
    {
        return generateNestedArray(
                Topic::where('subject_id', $this->id)
                    ->get()
                    ->toArray()
                );
    }
}
