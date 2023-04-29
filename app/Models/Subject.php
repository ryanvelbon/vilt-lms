<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function tutors(): BelongsToMany
    {
        return $this->belongsToMany(Tutor::class);
    }
}
