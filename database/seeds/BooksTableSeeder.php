<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('books')->insert([
                'title'        => 'Livre '.$i,
                'description'  => 'Ceci est le livre '.$i,
                'author_id'    => $i,
                'category_id'  => $i,
                'publisher_id' => $i,
                'user_id'      => 1,
                'cover_url'    => 'http://localhost:8000/img/livre1.jpg',
                'published_at' => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
