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
                'user_id'      => 1,
                'cover_url'    => 'covers/5e714252e3df8.png',
                'published_at' => now(),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
