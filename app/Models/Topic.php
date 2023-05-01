<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'description',
        'slug',
        'icon',
        'subject_id',
        'parent_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function parent()
    {
        return $this->belongsTo(Topic::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Topic::class, 'parent_id');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
}
