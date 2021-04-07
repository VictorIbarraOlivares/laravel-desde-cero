<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|-------------------------------------------------------------------------
|
*/

Route::get('/', 'PanelController@index')->name('panel'); // /panel
Route::resource('products', 'ProductController');

Route::get('users', 'UserController@index')->name('panel.users.index');
Route::post('users/admin/{user}', 'UserController@toggleAdmin')->name('panel.users.admin.toggle');