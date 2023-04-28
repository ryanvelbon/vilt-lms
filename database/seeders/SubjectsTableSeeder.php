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

        Subject::create([
            'title' => 'Math',
            'slug' => 'math',
            'icon' => 'square-root-variable'
        ]);

        Subject::create([
            'title' => 'Physics',
            'slug' => 'physics',
            'icon' => 'lightbulb-gear'
        ]);

        Subject::create([
            'title' => 'Biology',
            'slug' => 'biology',
            'icon' => 'dna'
        ]);

        Subject::create([
            'title' => 'Chemistry',
            'slug' => 'chemistry',
            'icon' => 'flask-vial'
        ]);

    }
}
