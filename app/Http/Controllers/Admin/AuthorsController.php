<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller {

    public function __construct()
    {
        $this->middleware('permission:manage_authors');
    }

    public function index()
    {
        $authors = Author::all();

        return view('admin.authors.index', ['authors' => $authors]);
    }

}