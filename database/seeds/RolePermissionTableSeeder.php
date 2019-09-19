<?php

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            'role_id'       => 1,
            'permission_id' => 1,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        DB::table('permission_role')->insert([
            'role_id'       => 1,
            'permission_id' => 2,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
