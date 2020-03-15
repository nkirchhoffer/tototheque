<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAuthorRequest;
use Illuminate\Auth\AuthManager;

class AuthorsController extends Controller
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
        $this->middleware('permission:manage_authors');
    }

    public function index()
    {
        $authors = Author::all();

        return view('admin.authors.index', ['authors' => $authors]);
    }

    public function new()
    {
        return view('admin.authors.new');
    }

    public function create(CreateAuthorRequest $request)
    {
        $userId = $this->auth->user()->id;

        $author = new Author();
        $author->firstname = $request->get('firstname');
        $author->lastname = $request->get('lastname');
        $author->biography = $request->get('biography');
        $author->user_id = $userId;
        $author->country_code = $request->get('country_code');
        $author->born_at = $request->get('birthdate');
        $author->died_at = $request->get('death');
        $author->save();

        return redirect()->route('admin.authors.index')->with('success', 'L\'auteur '.$author->firstname.' '.$author->lastname.' a bien été ajouté à la base de données.');
    }
}
