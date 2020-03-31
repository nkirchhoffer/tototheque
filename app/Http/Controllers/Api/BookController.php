<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    private $books;

    public function __construct(Book $books)
    {
        $this->books = $books;
    }

    public function all()
    {
        return $this->books->with(['authors', 'categories', 'user'])->orderBy('created_at', 'desc')->get();
    }

    public function get(Book $book)
    {
        return $this->books->with(['authors', 'replicas.publisher', 'categories', 'user'])->find($book->id);
    }

    public function search($search)
    {
        return $this->books->where('title', 'LIKE', '%'.$search.'%')->get();
    }
}
