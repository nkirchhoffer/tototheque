<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/replicas/borrow/{replica}', 'BorrowingsController@create');
    Route::post('/book/{book}/review', 'ReviewsController@submit');
    Route::get('/books/{book}/borrow', 'BorrowingsController@createBook');
});

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');

Route::get('/books', 'BookController@fetch');
Route::get('/books/{book}', 'BookController@get');
Route::get('/search/{search}', 'BookController@search');
Route::get('/authors/{author}', 'BookController@author');
Route::get('/categories/{category}', 'BookController@category');
