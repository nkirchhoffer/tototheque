<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;

class AppController extends Controller
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function render()
    {
        return view('app');
    }
}
