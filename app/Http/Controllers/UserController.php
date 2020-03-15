<?php


namespace App\Http\Controllers;


use App\User;
use App\VerificationToken;

class UserController extends Controller
{
    public function verify(VerificationToken $token) {
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
}