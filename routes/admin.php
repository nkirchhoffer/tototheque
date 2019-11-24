<?php

Route::get('/', 'HomeController@index')->name('admin.index');

Route::get('/roles', 'RolesController@index')->name('admin.roles.index');
Route::get('/permissions/assign', 'PermissionsController@index')->name('admin.perms.assign');
Route::get('/roles/create', 'RolesController@new')->name('admin.perms.roles');
Route::get('/users/roles', 'RolesController@users')->name('admin.perms.assign');

Route::post('/roles/create', 'RolesController@create')->name('admin.roles.new');
Route::post('/permissions/assign', 'PermissionsController@assign')->name('admin.perms.assign');
Route::post('/users/roles', 'RolesController@assign')->name('admin.roles.assign');
