<?php

namespace Database\Seeders;

use App\Models\Tutor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutorsTableSeeder extends Seeder
{
    public function run(): void
    {
        Tutor::factory(10)->create();
    }
}
