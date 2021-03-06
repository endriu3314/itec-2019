<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'ProductController@index');

Auth::routes();

//oauth
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

//normal routes
Route::get('/home', 'HomeController@index')->name('home');

//loged-in routes
Route::group(['middleware' => ['web']], function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', function () {
            return view('app');
        });

        Route::get('/profile/{id}', 'UserController@showProfile')->name('profile');

        Route::prefix('user')->group(function () {
            Route::post('update', 'UserController@updateUser')->name('update-user');
        });

        //admin routes
        Route::group(['middleware' => ['permission:admin_perms']], function(){
            Route::get('/admin', 'AdminController@index')->name('admin.home');
            Route::post('/make-vanzator', 'AdminController@setVanzator')->name('admin.make-vanzator');
            Route::post('/delete-vanzator', 'AdminController@deleteVanzator')->name('admin.delete-vanzator');

            Route::prefix('category')->group(function () {
                Route::post('/add', 'CategoryController@createCategory')->name('admin.create-category');
                Route::post('/sub-category/add', 'CategoryController@createSubCategory')->name('admin.create-sub-category');
            });
        });

        Route::group(['middleware' => ['permission:vanzator_perms']], function () {
            Route::prefix('vanzator')->group(function () {
                Route::get('/', 'VanzatorController@index')->name('vanzator.home');
                Route::post('create', 'ProductController@create')->name('vanzator.create');
                Route::post('update', 'ProductController@update')->name('vanzator.update');
            });
        });

        Route::get('cart', 'ProductController@cart');
        Route::get('add-to-cart/{id}', 'ProductController@addToCart');
        Route::patch('update-cart', 'ProductController@updateCart');
        Route::delete('remove-from-cart', 'ProductController@removeCart');

        Route::get('payment', 'PaymentController@index');
        Route::post('payment', 'PaymentController@store');

        Route::get('product/{id}', 'ProductController@product');
    });
});



