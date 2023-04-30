<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return SubjectResource::collection($subjects);
    }

    public function show(Request $request, Subject $subject)
    {
        $nested = $request->boolean('nested', true);

        if ($nested) {
            $subject->topics = $subject->topicsTree;
        } else {
            $subject->load('topics');
        }

        return $subject;
    }
}
