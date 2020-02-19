<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthManager;

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
        return view('admin.books.new');
    }
}
