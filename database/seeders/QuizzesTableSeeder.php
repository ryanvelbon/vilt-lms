<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizzesTableSeeder extends Seeder
{
    public function run(): void
    {
        Quiz::factory(20)->create();
    }
}
