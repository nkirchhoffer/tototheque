<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('categories')->insert([
                'name'        => 'Catégorie '.$i,
                'description' => 'Cette catégorie est la catégorie '.$i,
                'user_id'     => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
