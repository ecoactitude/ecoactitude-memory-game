<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Score::count() > 0) {
            return;
        }

        $scores = [
            ['name' => 'Julien SCHMITT', 'score' => 10],
            ['name' => 'Julien SCHMITT', 'score' => 15],
            ['name' => 'Raphaël KALINOWSKI', 'score' => 8],
            ['name' => 'Julien SCHMITT', 'score' => 7],
            ['name' => 'Raphaël KALINOWSKI', 'score' => 13],
            ['name' => 'Julien SCHMITT', 'score' => 1],
            ['name' => 'Julien SCHMITT', 'score' => 23],
            ['name' => 'Raphaël KALINOWSKI', 'score' => 23],
            ['name' => 'Alistair SCHMITT', 'score' => 3],
            ['name' => 'Aurélie TOURETTE', 'score' => 12],
            ['name' => 'Guillaume Lansel', 'score' => 23],
            ['name' => 'June', 'score' => 30]
        ];

        Score::insert($scores);
    }
}
