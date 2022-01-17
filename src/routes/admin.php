<?php

use Illuminate\Support\Facades\Route;

Route::put('menus/sort', 'MenuController@sort')->name('menus.sort');
Route::resource('menus', 'MenuController');
