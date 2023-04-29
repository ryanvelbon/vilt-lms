<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function show(Subject $subject)
    {
        return Inertia::render('Subject/Show', [
            'subject' => $subject->load('tutors')
        ]);
    }
}
