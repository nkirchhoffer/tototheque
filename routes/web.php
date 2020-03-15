<?php

/**
 * Front-office routes.
 */
use Illuminate\Support\Facades\Auth;

Route::get('/', 'AppController@render')->name('app');
Route::get('/member/login', 'AppController@render')->name('login');
Route::get('/member/register', 'AppController@render')->name('register');
Route::get('/verification/{VerificationToken}', 'UserController@verify')->name('verification');

Route::get('/auth', function () {
    Auth::loginUsingId(1);
});

Route::get('/logout', function () {
    Auth::logout();
});

Route::get('/mail', function() {
    $user = App\User::find(3);
    $token = $user->verificationTokens()->first();

    return new \App\Mail\VerifyMailAddress($token, $user);
});

Route::get('/test', function () {
    dd(Auth::user());
})->middleware('permission:access_admin');

Route::get('/demo', function() {
    return view('demo');
});