<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $genres = Genre::all()->pluck('id');
        /* * randomizzare la presenza di genere "Null" */
        $genres[] = null;
        /* *------------------------------------------ */

        for ($i = 0; $i < 20; $i++) {
            $genre_id = $faker->randomElement($genres);
            
            $book = new Book();
            // Genres
            $book->genre_id = $genre_id;
            // Genres END
            $book->title = $faker->words(3, true);
            $book->author = $faker->words(2, true);
            $book->isbn = $faker->isbn10();
            $book->editor = $faker->words(2, true);
            $book->published_in = $faker->year();
            $book->pages_num = $faker->numberBetween(1, 1000);
            $book->lent = $faker->numberBetween(0, 1);
            $book->lending_start = $faker->date();
            $book->lending_end = $faker->date();
            $book->cover = $faker->url();
            $book->quantity = $faker->numberBetween(1, 15);
            $book->status = $faker->numberBetween(1, 5);

            $book->save();
        }
    }
}