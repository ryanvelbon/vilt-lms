<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
        return Inertia::render('Quiz/Show', [
            'quiz' => new QuizResource($quiz),
        ]);
    }

    public function attempt(Quiz $quiz)
    {
        $quiz->load('questions');

        return Inertia::render('Quiz/Attempt', [
            'quiz' => new QuizResource($quiz),
        ]);
    }
}
