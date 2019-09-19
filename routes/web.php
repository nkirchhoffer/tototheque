<?php

/**
 * Front-office routes.
 */

use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'AppController@render')->name('app');


Route::get('/test', function() {
    dd(Auth::user());
})->middleware('permission:access_admin');