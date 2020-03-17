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

        if (!$cover->isValid()) {
            return redirect()->back(401)->withErrors('Un problème est survenu lors de l\'envoi de la couverture.');
        }

        $book = new Book
    }
 }
