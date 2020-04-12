<?php

namespace App\Http\Controllers\Api;

use App\Author;
use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function fetch(Request $request)
    {
        $offset = $request->get('offset');
        $limit = $request->get('limit');

        return Book::select('id', 'title', 'cover_url', 'description')
            ->with(['authors', 'categories', 'user'])
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get();
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

    public function category(Request $request, Category $category)
    {
        $offset = $request->get('offset');
        $limit = $request->get('limit');

        return [
            'category' => $category,
            'books'    => $category->books()->skip($offset)->take($limit)->with(['authors'])->get(),
        ];
    }

    public function search(Request $request, string $search)
    {
        $offset = $request->get('offset');
        $limit = $request->get('limit');

        return Book::with(['authors', 'categories'])
            ->where('title', 'LIKE', '%'.$search.'%')
            ->skip($offset)
            ->take($limit)
            ->get();
    }
}
