<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $table = 'books';

    public $dates = ['created_at', 'updated_at', 'deleted_at', 'published_at'];

    /**
     * Retourne l'auteur du livre.
     *
     * @return App\Author
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Retourne la maison d'édition du livre.
     *
     * @return App\Publisher
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * Retourne l'utilisateur ayant enregistré le livre.
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replicas()
    {
        return $this->hasMany(Replica::class);
    }
}
