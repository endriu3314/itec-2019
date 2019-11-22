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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//oauth
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

//normal routes
Route::get('/home', 'HomeController@index')->name('home');

//loged-in routes
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('app');
    });

    Route::get('/profile/{id}', 'UserController@showProfile')->name('profile');

    Route::prefix('user')->group(function () {
        Route::post('update', 'UserController@updateUser')->name('update-user');
    });

    //admin routes
    //Route::group(['middleware' => ['role:admin']], function(){
        Route::get('/admin', 'AdminController@index')->name('admin.home');
        Route::post('/make-vanzator', 'AdminController@setVanzator')->name('admin.make-vanzator');
        Route::post('/delete-vanzator', 'AdminController@deleteVanzator')->name('admin.delete-vanzator');
    //});
});



