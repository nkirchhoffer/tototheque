<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $dates = ['created_at', 'updated_at'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
