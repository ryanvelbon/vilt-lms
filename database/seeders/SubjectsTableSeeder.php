<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subjects')->delete();

        Subject::create(['title' => 'Math', 'icon' => 'square-root-variable']);
        Subject::create(['title' => 'Physics', 'icon' => 'lightbulb-gear']);
        Subject::create(['title' => 'Biology', 'icon' => 'dna']);
        Subject::create(['title' => 'Chemistry', 'icon' => 'flask-vial']);
    }
}
