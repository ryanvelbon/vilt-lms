<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TutorFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name;

        return [
            'user_id' => User::factory()->create()->id,
            'name' => $name,
            'bio' => fake()->paragraph,
            'pic' => fake()->imageUrl(),
            'website' => Str::slug($name) . ".com",
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Tutor $tutor) {
            $nSubjects = rand(1, 100) <= 90 ? 1 : 2;
            $subjects = Subject::inRandomOrder()->limit($nSubjects)->get()->pluck('id');
            $tutor->subjects()->attach($subjects);
        });
    }
}
