<?php

use Illuminate\Database\Seeder;

class AuthorBookTableSeeder extends Seeder
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
            DB::table('author_book')->insert([
                'author_id'  => 1,
                'book_id'    => $book->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('author_book')->insert([
                'author_id'  => 10,
                'book_id'    => $book->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
