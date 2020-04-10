<?php

/**
 * Front-office routes.
 */
use Illuminate\Support\Facades\Auth;

Route::get('/', 'AppController@render')->name('app');
Route::get('/member/login', 'AppController@render')->name('login');
Route::get('/member/register', 'AppController@render')->name('register');
Route::get('/books/{book}', 'AppController@render')->name('book');
Route::get('/search/{search}', 'AppController@render')->name('search');
Route::get('/authors/{author}', 'AppController@render')->name('author');
Route::get('/categories/{category}', 'AppController@render')->name('category');
Route::get('/publishers/{category}', 'AppController@render')->name('publisher');

/**
 * Gestion des emprunts.
 */
Route::get('/borrowings/cancel/{borrowing}', 'BorrowingsController@cancel')->name('borrowings.cancel');

Route::get('/verification/{VerificationToken}', 'UserController@verify')->name('verification');

Route::post('/member/login', 'UserController@login')->name('login');

Route::get('/logout', function () {
    Auth::logout();
});
