<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        $lesson->load('tutor');

        return Inertia::render('Lesson/Show', [
            'lesson' => new LessonResource($lesson)
        ]);
    }
}
