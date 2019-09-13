<?php

/**
 * Front-office routes.
 */
Route::get('/{any}', 'AppController@render')->where('any', '.*')->name('app');
