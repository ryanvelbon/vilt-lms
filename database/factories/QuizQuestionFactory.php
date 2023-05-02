<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizQuestionFactory extends Factory
{
    protected $model = QuizQuestion::class;

    public function definition(): array
    {
        return [
            'topic_id' => Topic::inRandomOrder()->first(),
            'question' => rtrim(trim($this->faker->sentence()), '.') . '?',
            'correct_option' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'option_a' => $this->faker->word(),
            'option_b' => $this->faker->word(),
            'option_c' => $this->faker->word(),
            'option_d' => $this->faker->word(),
        ];
    }
}
