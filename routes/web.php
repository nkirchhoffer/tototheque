<?php

/**
 * Front-office routes
 */

Route::get('/', 'HomeController@index')->name('app.home');

Route::get('/member/login', 'LoginController@index')->name('member.login');