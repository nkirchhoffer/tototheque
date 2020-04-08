<?php

/**
 * Front-office routes.
 */
use Illuminate\Support\Facades\Auth;

Route::get('/', 'AppController@render')->name('app');
Route::get('/member/login', 'AppController@render')->name('login');
Route::get('/member/register', 'AppController@render')->name('register');
Route::get('/books/{book}', 'AppController@render')->name('book');

/**
 * Gestion des emprunts.
 */
Route::get('/borrowings/cancel/{borrowing}', 'BorrowingsController@cancel')->name('borrowings.cancel');

Route::get('/verification/{VerificationToken}', 'UserController@verify')->name('verification');

Route::post('/member/login', 'UserController@login')->name('login');

Route::get('/auth', function () {
    Auth::loginUsingId(1);
});

Route::get('/logout', function () {
    Auth::logout();
});