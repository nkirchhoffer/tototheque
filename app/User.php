<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Restitution des roles avec une relation N..N.
     *
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Retourne si l'utilisateur dispose d'une certaine permission.
     *
     * @param Permission $permission Permission recherchée
     *
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        $permission = Permission::where('title', '=', $permission)->first();
        $permissions = [];

        foreach ($this->roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissions[] = $permission;
            }
        }

        return in_array($permission, $permissions);
    }
<<<<<<< HEAD

    public function superiorTo(User $user): bool {
        $highestRole = 0;

        foreach ($user->roles as $role) {
            if ($role->rank > $highestRole) {
                $highestRole = $role->rank;
            }
        }

        $superior = false;
        foreach ($this->roles as $role) {
            if ($role->rank > $highestRole) {
                $superior = true;
                break;
            }
        }

        return $superior;

    }

=======
>>>>>>> 0e98059ca8e37a3ad4da202a840c9b6eab1f5b4f
}
