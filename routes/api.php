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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{id}', 'UserController@getUser')->name('api-userdata');
Route::get('/users', 'UserController@getUsers')->name('api-users');
Route::get('/user-role/{id}', 'UserController@getUserRole')->name('api-userrole');

Route::get('products/{id}', 'ProductController@getProducts')->name('api-productsdata');
Route::delete('/products/{id}', 'ProductController@delete')->name('api-deleteproduct');