<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\User;
use App\VerificationToken;
use Illuminate\Auth\AuthManager;

class UserController extends Controller
{

    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function verify(VerificationToken $token)
    {
        $token = VerificationToken::where('token', '=', $token)->first();

        if (!$token) {
            return redirect()->route('login')->withErrors('Ce token est introuvable.');
        }

        $user = User::find($token->user_id);

        if (!$user) {
            return redirect()->route('login')->withErrors('L\'utilisateur associé à ce token est introuvable.');
        }

        $token->verified_at = now();
        $user->email_verified_at = now();
        $token->save();
        $user->save();

        return redirect()->route('login')->with('success', 'Cette adresse mail a bien été vérifiée.');
    }

    public function login(UserLoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if (!$this->auth->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->back()->withErrors('L\'adresse mail ou le mot de passe est incorrect.');
        }

        return redirect()->route('app')->with('success', 'Bienvenue, '.$this->auth->user()->name);
    }
}
