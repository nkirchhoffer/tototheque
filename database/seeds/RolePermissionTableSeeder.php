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
        $permissions = DB::table('permissions')->get();

        foreach ($permissions as $permission) {
            DB::table('permission_role')->insert([
                'role_id'       => 1,
                'permission_id' => $permission->id,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
