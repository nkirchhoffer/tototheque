<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $table = 'borrowings';
    protected $primaryKey = 'id';

    public $dates = [
        'started_at',
        'starting_at',
        'finishing_at',
        'finished_at',
        'created_at',
        'updated_at',
        'validated_at',
        'cancelled_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replica()
    {
        return $this->belongsTo(Replica::class);
    }

    public function book()
    {
        return $this->hasOneThrough(Book::class, Replica::class);
    }

    public function late()
    {
        if (is_null($this->finished_at)) {
            return now()->diffInDays($this->finishing_at, false);
        } else {
            return $this->finished_at->diffInDays($this->finishing_at, false);
        }
    }
}
