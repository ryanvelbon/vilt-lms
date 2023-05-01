<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {        
        $topic->load('subject', 'children');

        return Inertia::render('Topic/Show', [
            'topic' => $topic
        ]);
    }
}
