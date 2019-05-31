<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nicolas Kirchhoffer',
            'nick' => 'nkirchho',
            'email' => 'kirchhoffer.nicolas@live.fr',
            'password' => bcrypt('testestest'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
