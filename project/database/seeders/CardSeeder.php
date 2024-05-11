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
            ['src' => 'baume-corps.webp', 'alt' => 'Baume corps'],
            ['src' => 'boule-graisse.webp', 'alt' => 'Boule graisse'],
            ['src' => 'creme-visage.webp', 'alt' => 'Crème visage'],
            ['src' => 'deodorant.webp', 'alt' => 'Déodorant'],
            ['src' => 'pain-vaisselle.webp', 'alt' => 'Pain vaisselle'],
            ['src' => 'papierrecycle.png', 'alt' => 'Papier recyclé'],
            ['src' => 'pate-a-modeler.png', 'alt' => 'Pate à modeler'],
            ['src' => 'savon.webp', 'alt' => 'Savon'],
            ['src' => 'tablettes-lave-vaisselle.webp', 'alt' => 'Tablettes lave-vaisselle']
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
