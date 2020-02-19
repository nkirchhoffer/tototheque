<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('admin.index');

Route::get('/roles', 'RolesController@index')->name('admin.roles.index');
Route::get('/permissions/assign', 'PermissionsController@index')->name('admin.perms.assign');
Route::get('/roles/create', 'RolesController@new')->name('admin.perms.roles');
Route::get('/users/roles', 'RolesController@users')->name('admin.perms.assign');
Route::get('/roles/withdraw/{user}', 'RolesController@withdrawView')->name('admin.roles.withdraw');
Route::get('/roles/withdraw/all/{user}', 'RolesController@withdrawAll')->name('admin.roles.withdrawAll');
Route::get('/authors', 'AuthorsController@index')->name('admin.authors.index');
Route::get('/authors/create', 'AuthorsController@new')->name('admin.authors.create');
Route::get('/books/create', 'BooksController@newBook')->name('admin.books.create');

Route::post('/roles/create', 'RolesController@create')->name('admin.roles.new');
Route::post('/permissions/assign', 'PermissionsController@assign')->name('admin.perms.assign');
Route::post('/users/roles', 'RolesController@assign')->name('admin.roles.assign');
Route::post('/roles/withdraw/{user}', 'RolesController@withdraw')->name('admin.roles.withdraw');
Route::post('/authors/create', 'AuthorsController@create')->name('admin.authors.create');
