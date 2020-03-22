<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = DB::table('books')->get();

        foreach ($books as $book) {
            DB::table('book_category')->insert([
                'book_id' => $book->id,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('book_category')->insert([
                'book_id' => $book->id,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
