<?php

namespace App\Http\Controllers\Api;

use App\Author;
use App\Book;
use App\Category;
use App\Http\Controllers\Controller;

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
            'user', ])
            ->find($book->id);
    }

    public function author(Author $author)
    {
        return $author->load(['books.categories']);
    }

    public function category(Category $category)
    {
        return $category->load(['books.authors']);
    }

    public function search(string $search)
    {
        return Book::with(['authors', 'categories'])->where('title', 'LIKE', '%'.$search.'%')->get();
    }
}
