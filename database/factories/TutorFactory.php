<?php

namespace Database\Factories;

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
}
