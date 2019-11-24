<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionAssignRequest;
use App\Permission;
use App\Role;

class PermissionsController extends Controller {

    public function index() {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.permissions.assign', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function assign(PermissionAssignRequest $request) {
        $role = Role::find($request->get('role'));
        $permission = Permission::find($request->get('permission'));

        if ($role->permissions()->where('id', '=', $permission->id)->count() >= 1) {
            return redirect()->back()->withErrors('Cette permission est déjà assignée au rôle ' . $role->title);
        }

        $role->permissions()->attach($permission->id);

        return redirect()->back()->with('success', 'La permission ' . $permission->title . ' a été assignée au rôle ' . $role->title);
    }

}
