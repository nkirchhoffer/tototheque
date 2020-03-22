<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Publisher;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Storage;

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
            'books' => Book::paginate(10),
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
        $categories = $request->get('categories');
        $cover = $request->file('cover');
        $publishedAt = $request->get('publishedAt');

        if (!$cover->isValid()) {
            return redirect()->back(401)->withErrors('Un problème est survenu lors de l\'envoi de la couverture.');
        }

        $filename = uniqid();
        $path = $cover->storeAs('covers', $filename.'.'.$cover->extension(), 's3');
        Storage::disk('s3')->setVisibility($path, 'public');

        $book = new Book();
        $book->title = $title;
        $book->description = $description;
        $book->user_id = $request->user()->id;
        $book->cover_url = $path;
        $book->published_at = $publishedAt;
        $book->save();

        foreach ($authors as $author) {
            $book->authors()->attach($author);
        }

        foreach ($categories as $category) {
            $book->categories()->attach($category);
        }

        return redirect()->route('admin.books.index')->with('success', 'Le livre '.$book->title.' a bien été créé !');
    }

    public function update(Book $book)
    {
        return view('admin.books.update', [
            'book'       => $book,
            'categories' => Category::all(),
            'authors'    => Author::all(),
        ]);
    }

    public function submitUpdate(UpdateBookRequest $request, Book $book)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $authors = $request->get('authors');
        $categories = $request->get('categories');
        $cover = $request->file('cover');
        $publishedAt = $request->get('publishedAt');

        if (!is_null($cover)) {
            if (!$cover->isValid()) {
                return redirect()->back(401)->withErrors('Un problème est survenu lors de l\'envoi de la couverture.');
            }

            $filename = uniqid();
            $path = $cover->storeAs('covers', $filename.'.'.$cover->extension(), 's3');
            $book->cover_url = $path;
            Storage::disk('s3')->setVisibility($path, 'public');
        }

        $book->title = $title;
        $book->description = $description;
        $book->user_id = $request->user()->id;
        $book->published_at = $publishedAt;
        $book->save();

        foreach ($book->authors as $author) {
            $book->authors()->detach($author);
        }

        foreach ($book->categories as $category) {
            $book->categories()->detach($category);
        }

        foreach ($authors as $author) {
            $book->authors()->attach($author);
        }

        foreach ($categories as $category) {
            $book->categories()->attach($category);
        }

        return redirect()->route('admin.books.index')->with('success', 'Le livre '.$book->title.' a bien été édité !');
    }
}
