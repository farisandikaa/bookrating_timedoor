<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Rating;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BigDataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $now = Carbon::now();

        
        $authors = [];
        for ($i = 0; $i < 1000; $i++) {
            $authors[] = [
                'name' => $faker->name() . ' ' . $faker->randomNumber(3),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        Author::insert($authors);
        unset($authors);
        echo "Authors seeded (1000)\n";


        $categories = [];
        for ($i = 0; $i < 3000; $i++) {
            $categories[] = [
                'name' => $faker->word() . '_' . $faker->randomNumber(4),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        Category::insert($categories);
        unset($categories);
        echo "Categories seeded (3000)\n";


        $books = [];
        $authorIds = Author::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        for ($i = 0; $i < 100000; $i++) {
            $books[] = [
                'name' => ucfirst($faker->words(3, true)) . ' #' . $faker->randomNumber(5),
                'author_id' => $faker->randomElement($authorIds),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => $now,
                'updated_at' => $now,
            ];

        
            if (count($books) >= 5000) {
                Book::insert($books);
                $books = [];
            }
        }
        if (count($books) > 0) Book::insert($books);
        unset($books);
        echo "Books seeded (100000)\n";


        $bookIds = Book::pluck('id')->toArray();
        $ratings = [];

        for ($i = 0; $i < 500000; $i++) {
            $ratings[] = [
                'book_id' => $faker->randomElement($bookIds),
                'rating' => $faker->numberBetween(1, 10),
                'created_at' => $now,
                'updated_at' => $now,
            ];


            if (count($ratings) >= 10000) {
                Rating::insert($ratings);
                $ratings = [];
            }
        }
        if (count($ratings) > 0) Rating::insert($ratings);
        unset($ratings);
        echo "Ratings seeded (500000)\n";

        echo "\n All fake data successfully generated!\n";
    }
}
