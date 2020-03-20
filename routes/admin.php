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
 * CRUD Auteurs.
 */
Route::get('/authors/create', 'AuthorsController@new')->name('admin.authors.create');
Route::get('/authors', 'AuthorsController@index')->name('admin.authors.index');
Route::get('/authors/update/{author}', 'AuthorsController@update')->name('admin.authors.update');
Route::get('/authors/delete/{author}', 'AuthorsController@delete')->name('admin.authors.delete');

Route::post('/authors/create', 'AuthorsController@create')->name('admin.authors.create');
Route::post('/authors/update/{author}', 'AuthorsController@submitUpdate')->name('admin.authors.update');

/**
 * CRUD Livres.
 */
Route::get('/books/create', 'BooksController@newBook')->name('admin.books.create');
Route::get('/books', 'BooksController@index')->name('admin.books.index');
Route::get('/books/update/{book}', 'BooksController@update')->name('admin.books.update');
Route::get('/books/delete/{book}', 'BooksController@delete')->name('admin.books.delete');

Route::post('/books/create', 'BooksController@submitNewBook')->name('admin.books.create');
Route::post('/books/update/{book}', 'BooksController@submitUpdate')->name('admin.books.update');

/**
 * CRUD Réplicas.
 */
Route::get('/books/{book}', 'ReplicasController@index')->name('admin.replicas.index');
Route::get('/books/{book}/create', 'ReplicasController@create')->name('admin.replicas.create');
Route::get('/replicas/update/{replica}', 'ReplicasController@update')->name('admin.replicas.update');
Route::get('/replicas/delete/{replica}', 'ReplicasController@delete')->name('admin.replicas.delete');

Route::post('/books/{book}/create', 'ReplicasController@submitCreate')->name('admin.replicas.create');
Route::post('/replicas/update/{replica}', 'ReplicasController@submitUpdate')->name('admin.replicas.update');
/**
 * CRUD Catégories.
 */
Route::get('/categories/create', 'CategoriesController@create')->name('admin.categories.create');
Route::get('/categories', 'CategoriesController@index')->name('admin.categories.index');
Route::get('/categories/update/{category}', 'CategoriesController@update')->name('admin.categories.update');
Route::get('/categories/delete/{category}', 'CategoriesController@delete')->name('admin.categories.delete');

Route::post('/categories/create', 'CategoriesController@submitCreate')->name('admin.categories.create');
Route::post('/categories/update/{category}', 'CategoriesController@submitUpdate')->name('admin.categories.update');

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
