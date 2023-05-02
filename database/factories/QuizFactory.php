<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph,
            'duration' => $this->faker->randomElement([5, 10, 15, 20, 30, 45, 60]),
            'level' => rand(1,7),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'tutor_id' => Tutor::inRandomOrder()->first(),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Quiz $quiz) {
            $questions = QuizQuestion::factory()->count(10)->create(['quiz_id' => $quiz->id]);
            // $quiz->topics()->sync($questions->pluck('topic_id')->unique());
        });
    }
}
