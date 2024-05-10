<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hydrate DB if no Cards are present in the DB

        if (Card::count() > 0) {
            return;
        }

        $cards = [];
        $images = [
            ['src' => 'img_bahamut.webp', 'alt' => 'Bahamut'],
            ['src' => 'img_garuda.webp', 'alt' => 'Garuda'],
            ['src' => 'img_ifrit.webp', 'alt' => 'Ifrit'],
            ['src' => 'img_odin.webp', 'alt' => 'Odin'],
            ['src' => 'img_ramuh.webp', 'alt' => 'Ramuh'],
            ['src' => 'img_shiva.webp', 'alt' => 'Shiva'],
            ['src' => 'img_titan.webp', 'alt' => 'Titan'],
            ['src' => 'img_leviathan.jpg', 'alt' => 'Leviathan']
        ];

        foreach ($images as $image) {
            $pair = [
                'lot' => uniqid(), // generate a unique id for each pair
                'src' => $image['src'],
                'alt' => $image['alt']
            ];
            $cards[] = $pair;
            $cards[] = $pair;
        }

        // add an ID to each card
        $cards = array_map(function ($card) {
            $card['id'] = crc32(uniqid());
            return $card;
        }, $cards);

        Card::insert($cards);
    }
}
