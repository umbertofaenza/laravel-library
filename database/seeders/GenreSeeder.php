<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $labels = [
            "Fantascienza",
            "Horror",
            "Romanzo giallo",
            "Fantasy",
            "Storico"
        ];

        foreach($labels as $label) {
          $genre = new Genre();
          $genre->label = $label;
          $genre->color = $faker->hexColor();
          $genre->save();
        }
    }
}
