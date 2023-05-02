<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'duration' => $this->duration,
            'level' => $this->level,
            'status' => $this->status,
            'questions' => QuizQuestionResource::collection($this->whenLoaded('questions')),
            'tutor' => [
                'id' => $this->tutor->id,
                'name' => $this->tutor->name,
                'pic' => $this->tutor->pic,
            ],
            'published_at' => $this->published_at->format('Y-m-d'),
        ];
    }
}
