<?php

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('publishers')->insert([
                'name'         => 'Editeur '.$i,
                'country_code' => 'fr',
                'opened_at'    => now(),
                'user_id'      => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
