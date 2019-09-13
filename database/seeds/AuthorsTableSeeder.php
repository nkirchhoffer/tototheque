<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('authors')->insert([
                'firstname' => 'Auteur',
                'lastname' => $i,
                'biography' => 'Ceci était l\'auteur ' . $i,
                'user_id' => 1,
                'country_code' => 'fr',
                'born_at' => now(),
                'died_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
