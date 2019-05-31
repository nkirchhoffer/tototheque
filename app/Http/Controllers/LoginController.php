<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;

class LoginController extends Controller
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest');
    }

    public function index()
    {
        return view('app', [
            'title' => 'Connexion à l\'espace membre',
        ]);
    }
}
