<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if (!$this->auth->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'error'   => 401,
                'message' => 'L\'adresse e-mail ou le mot de passe ne convient pas.',
            ], 401);
        }

        return $this->auth->user();
    }
}
