<?php

namespace Database\Seeders;

use App\Models\Credit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hydrate DB if no Cards are present in the DB

        if (Credit::count() > 0) {
            return;
        }

        $credits = [
            ['name' => 'Julien SCHMITT', 'job' => 'Director', 'url' => 'https://github.com/noweh'],
            ['name' => 'Julien SCHMITT', 'job' => 'Game Designer', 'url' => 'https://github.com/noweh'],
            ['name' => 'Julien SCHMITT', 'job' => 'Background Designer', 'url' => 'https://github.com/noweh'],
            ['name' => 'Julien SCHMITT', 'job' => 'Lead Event Designer', 'url' => 'https://github.com/noweh'],
            ['name' => 'Julien SCHMITT', 'job' => 'Lead Graphic Designer', 'url' => 'https://github.com/noweh'],
            ['name' => 'Julien SCHMITT', 'job' => 'Lead Menu System Designer', 'url' => 'https://github.com/noweh'],
            ['name' => 'Julien SCHMITT', 'job' => 'Visual and Graphics', 'url' => 'https://github.com/noweh'],
            ['name' => 'Julien SCHMITT', 'job' => 'Lead Programmer', 'url' => 'https://github.com/noweh'],
            ['name' => 'Alistair SCHMITT', 'job' => 'QA Tester', 'url' => null],
            ['name' => 'June', 'job' => 'Just a cat 🐱', 'url' => 'https://www.instagram.com/p/C54yl6tIbzn']
        ];

        Credit::insert($credits);
    }
}
