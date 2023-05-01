<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'slug'         => $this->slug,
            'description'  => $this->description,
            'content'      => $this->content,
            'video_url'    => $this->video_url,
            'level'        => $this->level,
            'status'       => $this->status,
            'published_at' => $this->published_at,
            'tutor'        => new TutorResource($this->whenLoaded('tutor')),
            'topic'        => [
                'id'    => $this->topic->id,
                'title' => $this->topic->title,
                'slug'  => $this->topic->slug,
            ],
            'subject'      => $this->topic->subject,
        ];
    }
}
