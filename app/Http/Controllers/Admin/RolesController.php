<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignRoleRequest;
use App\Http\Requests\CreateRoleRequest;
use App\Permission;
use App\Role;
use App\User;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage_roles');
    }

    public function index()
    {
        $usersList = User::with(['roles'])->get();
        $users = [];

        foreach ($usersList as $user) {
            if ($user->roles()->count() != 0) {
                $users[] = $user;
            }
        }

        return view('admin.roles.index', ['users' => $users]);
    }

    public function new()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.roles.new', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function create(CreateRoleRequest $request)
    {
        $title = $request->get('title');
        $rank = $request->get('rank');

        $role = new Role();
        $role->title = $title;
        $role->rank = $rank;
        $role->save();

        return redirect()->route('admin.roles.new')->with('success', 'Le rôle '.$role->title.' a bien été créé !');
    }

    public function users()
    {
        $roles = Role::all();
        $users = User::all();

        return view('admin.roles.users', ['roles' => $roles, 'users' => $users]);
    }

    public function assign(AssignRoleRequest $request)
    {
        $userId = $request->get('user');
        $roleId = $request->get('role');

        $user = User::find($userId);
        $role = Role::find($roleId);

        if ($user->roles()->where('roles.id', '=', $roleId)->count() != 0) {
            return redirect()->back()->withErrors('Ce rôle est déjà assigné à '.$user->name);
        }

        $user->roles()->attach($roleId);

        return redirect()->back()->with('success', 'Le rôle '.$role->title.' a bien été assigné à '.$user->name);
    }
}
