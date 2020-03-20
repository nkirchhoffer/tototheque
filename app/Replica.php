<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replica extends Model
{
    protected $table = 'replicas';
    protected $primaryKey = 'id';

    public $dates = ['published_at', 'created_at', 'published_at', 'bought_at', 'updated_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
