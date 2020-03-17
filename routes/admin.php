<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('admin.index');

Route::get('/roles', 'RolesController@index')->name('admin.roles.index');
Route::get('/permissions/assign', 'PermissionsController@index')->name('admin.perms.assign');
Route::get('/roles/create', 'RolesController@new')->name('admin.perms.roles');
Route::get('/users/roles', 'RolesController@users')->name('admin.perms.assign');
Route::get('/roles/withdraw/{user}', 'RolesController@withdrawView')->name('admin.roles.withdraw');
Route::get('/roles/withdraw/all/{user}', 'RolesController@withdrawAll')->name('admin.roles.withdrawAll');

/**
 * CRUD Auteurs
 */
Route::get('/authors/create', 'AuthorsController@new')->name('admin.authors.create');
Route::get('/authors', 'AuthorsController@index')->name('admin.authors.index');
Route::get('/authors/update/{author}', 'AuthorsController@update')->name('admin.authors.update');
Route::get('/authors/delete/{author}', 'AuthorsController@delete')->name('admin.authors.delete');

Route::post('/authors/create', 'AuthorsController@create')->name('admin.authors.create');
Route::post('/authors/update/{author}', 'AuthorsController@submitUpdate')->name('admin.authors.update');

/**
 * CRUD Livres
 */
Route::get('/books/create', 'BooksController@newBook')->name('admin.books.create');
Route::get('/books', 'BooksController@index')->name('admin.books.index');

Route::post('/books/create', 'BooksController@submitNewBook')->name('admin.books.create');

/**
 * CRUD Editeurs.
 */
Route::get('/publishers/create', 'PublishersController@create')->name('admin.publishers.create');
Route::get('/publishers', 'PublishersController@index')->name('admin.publishers.index');
Route::get('/publishers/update/{publisher}', 'PublishersController@update')->name('admin.publishers.update');
Route::get('/publishers/delete/{publisher}', 'PublishersController@delete')->name('admin.publishers.delete');

Route::post('/publishers/create', 'PublishersController@submitCreate')->name('admin.publishers.create');
Route::post('/publishers/update/{publisher}', 'PublishersController@submitUpdate')->name('admin.publishers.update');

Route::post('/roles/create', 'RolesController@create')->name('admin.roles.new');
Route::post('/permissions/assign', 'PermissionsController@assign')->name('admin.perms.assign');
Route::post('/users/roles', 'RolesController@assign')->name('admin.roles.assign');
Route::post('/roles/withdraw/{user}', 'RolesController@withdraw')->name('admin.roles.withdraw');
