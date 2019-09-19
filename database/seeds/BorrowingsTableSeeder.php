<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('borrowings')->insert([
                'replica_id' => $i,
                'user_id' => 1,
                'starting_at' => now()->subDays(40),
                'started_at' => now()->subDays(40),
                'finishing_at' => now()->subDays(20),
                'finished_at' => now()->subDays(20),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            DB::table('borrowings')->insert([
                'replica_id' => $i,
                'user_id' => 1,
                'starting_at' => now()->subDays(10),
                'started_at' => now()->subDays(10),
                'finishing_at' => now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
