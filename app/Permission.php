<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    protected $table = 'permissions';
    protected $primaryKey = 'id';

    public $dates = ['created_at', 'updated_at'];

    public function roles() {
        return $this->belongsTo(Role::class);
    }

}