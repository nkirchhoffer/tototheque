<?php

/**
 * Front-office routes.
 */
use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'AppController@render')->name('app');

<<<<<<< HEAD
Route::get('/auth', function() {
    Auth::loginUsingId(1);
});

Route::get('/logout', function() {
    Auth::logout();
});

Route::get('/test', function() {
=======
Route::get('/test', function () {
>>>>>>> 0e98059ca8e37a3ad4da202a840c9b6eab1f5b4f
    dd(Auth::user());
})->middleware('permission:access_admin');
