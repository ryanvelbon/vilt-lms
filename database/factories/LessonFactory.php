<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Topic;
use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition(): array
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(5, true),
            'video_url' => rand(1,10) > 9 
                ? sprintf('https://youtu.be/%s', $this->faker->regexify('[A-Za-z0-9_-]{11}'))
                : null,
            'level' => $this->faker->numberBetween(1, 7),
            'topic_id' => Topic::inRandomOrder()->first(),
            'tutor_id' => Tutor::inRandomOrder()->first(),
            'status' => 'published',
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
