<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationToken extends Model
{
    protected $table = 'verification_tokens';
    protected $primaryKey = 'id';

    public $dates = ['verified_at', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
