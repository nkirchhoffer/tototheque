<?php

/**
 * Front-office routes.
 */
use Illuminate\Support\Facades\Auth;

Route::get('/', 'AppController@render')->name('app');

Route::get('/auth', function () {
    Auth::loginUsingId(1);
});

Route::get('/logout', function () {
    Auth::logout();
});

Route::get('/test', function () {
    dd(Auth::user());
})->middleware('permission:access_admin');
