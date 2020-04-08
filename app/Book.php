<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $table = 'books';

    public $appends = ['is_borrowable'];

    public $dates = ['created_at', 'updated_at', 'deleted_at', 'published_at'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replicas()
    {
        return $this->hasMany(Replica::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getIsBorrowableAttribute()
    {
        $borrowed = [];

        foreach ($this->replicas as $replica) {
            if ($replica->is_borrowed) {
                $borrowed[] = $replica;
            }
        }

        return count($borrowed) !== $this->replicas->count();
    }
}
