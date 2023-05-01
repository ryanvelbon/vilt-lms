<?php

namespace App\Http\Controllers;

use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        return Inertia::render('Topic/Show', [
            'topic' => new TopicResource($topic)
        ]);
    }
}
