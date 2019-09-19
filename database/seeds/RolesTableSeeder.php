<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'title'      => 'Directeur',
            'rank'       => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
