<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'slug'        => $this->slug,
            'description' => $this->description,
            'icon'        => $this->icon,
            'subject'     => $this->subject,
            'children'    => $this->children->map(function ($subtopic) {
                return [
                    'id'    => $subtopic->id,
                    'title' => $subtopic->title,
                    'slug'  => $subtopic->slug,
                ];
            }),
            'parent' => [
                'id'    => $this->parent->id,
                'title' => $this->parent->title,
                'slug'  => $this->parent->slug,
            ],
            'lessons' => $this->lessons->map(function ($lesson) {
                return [
                    'id'           => $lesson->id,
                    'title'        => $lesson->title,
                    'slug'         => $lesson->slug,
                    'description'  => $lesson->description,
                    'level'        => $lesson->level,
                    'published_at' => $lesson->published_at ? $lesson->published_at->format('Y-m-d') : null,
                ];
            }),
        ];
    }
}
