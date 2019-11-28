<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignRoleRequest;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\WithdrawRoleRequest;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Auth\AuthManager;

class RolesController extends Controller
{

    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;

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

    public function withdrawView(User $user)
    {
        if ((!$this->auth->user()->superiorTo($user) || !$this->auth->user()->hasPermission('manage_roles')) && $user->id !== $this->auth->user()->id) {
            return redirect()->route('admin.index')->withErrors('Action non autorisée.');
        }

        return view('admin.roles.withdraw', ['user' => $user]);

    }

    public function withdraw(WithdrawRoleRequest $request, User $user) 
    {
        $roleId = $request->get('role');
        $role = Role::find($roleId);

        $user->roles()->detach($role);

        return redirect()->route('admin.roles.index')->with('success', 'Le rôle '.$role->title.' a bien été retiré à '.$user->name);

    }

    public function withdrawAll(User $user) {
        if ((!$this->auth->user()->superiorTo($user) || !$this->auth->user()->hasPermission('manage_roles')) && $user->id !== $this->auth->user()->id) {
            return redirect()->route('admin.index')->withErrors('Action non autorisée.');
        }

        foreach($user->roles as $role) {
            $user->roles()->detach($role);
        }

        return redirect()->back()->with('success', 'Tous les rôles ont été retirés à '.$user->name);
    }
}
