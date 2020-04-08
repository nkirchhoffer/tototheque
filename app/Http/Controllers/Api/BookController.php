<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;

class BookController extends Controller
{

    public function all()
    {
        return Book::select('id', 'title', 'cover_url', 'description')->with(['authors', 'categories', 'user'])->orderBy('created_at', 'desc')->get();
    }

    public function get(Book $book)
    {
        return Book::with(['authors',
            'replicas.publisher',
            'reviews.author',
            'categories',
            'user'])
            ->find($book->id);
    }

    public function search($search)
    {
        return Book::where('title', 'LIKE', '%'.$search.'%')->get();
    }
}
