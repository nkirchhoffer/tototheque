<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplicasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            for ($j = 1; $j <= 20; $j++) {
                DB::table('replicas')->insert([
                    'book_id' => $i,
                    'publisher_id' => $j,
                    'isbn' => 1234567891012,
                    'state' => '0',
                    'published_at' => now()->subYears(30),
                    'bought_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
