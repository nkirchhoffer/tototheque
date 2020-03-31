<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Mail\VerifyMailAddress;
use App\User;
use App\VerificationToken;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function register(CreateUserRequest $request)
    {
        $name = $request->get('name');
        $nick = $request->get('nick');
        $email = $request->get('email');
        $password = bcrypt($request->get('password'));
        $phoneNumber = $request->get('phone_number');

        $user = new User();
        $user->name = $name;
        $user->nick = $nick;
        $user->email = $email;
        $user->password = $password;

        if (!is_null($phoneNumber)) {
            if (strlen($phoneNumber) != 10 && is_null((int) $phoneNumber)) {
                return response()->json([
                    'message' => 'Une erreur a été rencontrée',
                    'errors'  => [
                        'phone_number' => 'Le numéro de téléphone doit faire 10 caractères et être un nombre valide.',
                    ],
                ], 422);
            }

            $user->phone_number = $phoneNumber;
        }

        $user->save();

        $token = new VerificationToken();
        $token->token = uniqid();
        $token->user_id = $user->id;
        $token->save();

        Mail::to($user)->queue(new VerifyMailAddress($token, $user));

        return ['status' => 'success', 'message' => 'Votre compte a bien été créé. Un mail de confirmation vous a été envoyé, veuillez cliquer sur le lien renseigné.'];
    }
}
