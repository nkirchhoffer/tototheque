<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replica extends Model
{
    protected $table = 'replicas';
    protected $primaryKey = 'id';
    public $appends = ['is_borrowed'];

    public $dates = ['published_at', 'created_at', 'published_at', 'bought_at', 'updated_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

    public function getIsBorrowedAttribute()
    {
        $borrowings = $this->borrowings()->where('starting_at', '!=', null)->where('finished_at', '=', null)->get();

        if ($borrowings->count() > 0) {
            return true;
        }

        return false;
    }
}
