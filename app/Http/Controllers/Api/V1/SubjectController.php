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
}
