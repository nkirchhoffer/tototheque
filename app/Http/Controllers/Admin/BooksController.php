<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use App\Author;
use App\Publisher;

class BooksController extends Controller
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;

        $this->middleware('permission:manage_books');
    }

    public function index()
    {
        return view('admin.books.index', [
            'books' => Book::paginate(10)
        ]);
    }

    public function newBook()
    {
        return view('admin.books.new', [
            'authors'    => Author::all(),
            'publishers' => Publisher::all(),
        ]);
    }

    public function submitNewBook(CreateBookRequest $request)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $authors = $request->get('authors');
        $publishers = $request->get('publishers');
        $cover = $request->file('cover');
        $publishedAt = $request->get('publishedAt');

        if (!$cover->isValid()) {
            return redirect()->back(401)->withErrors('Un problème est survenu lors de l\'envoi de la couverture.');
        }

        $filename = uniqid();
        $path = $cover->storeAs('covers', $filename . '.' . $cover->extension(), 's3');

        $book = new Book;
        $book->title = $title;
        $book->description = $description;
        $book->user_id = $request->user()->id;
        $book->cover_url = $path;
        $book->published_at = $publishedAt;
        $book->save();

        foreach ($request->get('authors') as $author) {
            $book->authors()->attach($author);
        }

        return redirect()->route('admin.books.index')->with('success', 'Le livre ' . $book->title . ' a bien été créé !');
    }
 }
