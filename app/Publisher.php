<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use SoftDeletes;

    protected $table = 'publishers';

    public $dates = ['created_at', 'updated_at', 'deleted_at', 'opened_at', 'closed_at'];

    /**
     * Retourne l'utilisateur qui a créé l'objet.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Liste les livres associés à cet éditeur.
     *
     * @return HasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function replicas()
    {
        return $this->hasMany(Replica::class);
    }
}
