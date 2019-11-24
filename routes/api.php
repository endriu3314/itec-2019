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

Route::get('products/', 'ProductController@getAllProducts')->name('api-allproducts');
Route::get('products/{id}', 'ProductController@getProducts')->name('api-productsdata');
Route::delete('/products/{id}', 'ProductController@delete')->name('api-deleteproduct');
Route::get('product/{id}', 'ProductController@productId')->name('api-productid');

Route::get('/categories/', 'CategoryController@getCategories')->name('api-getcategories');
Route::get('/sub-categories-names/', 'CategoryController@getSubCategoriesWithName')->name('api-getsubcategoriesnames');
Route::get('/sub-categories/', 'CategoryController@getSubCategories')->name('api-getsubcategories');

Route::get('/cart', 'PaymentController@sessionCart')->name('api-session-cart');

Route::get('/payments/{id}', 'PaymentController@userPayments')->name('api-payments');