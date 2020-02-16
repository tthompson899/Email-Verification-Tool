<?php

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

Route::prefix('user')->group(function () {
    // this needs to be a post method
    Route::post('/create', 'ApiUserController@create')->name('api.users.create');
});

Route::prefix('admin')->group(function () {
    Route::get('all', 'ApiAdminController@all')->name('api.admin.all');
});
