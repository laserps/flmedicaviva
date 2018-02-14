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
Route::get('/home', 'HomeController@index')->name('home');

//FacebookAuthController
Route::get('/redirect', 'FacebookAuthController@redirect');
Route::get('/callback', 'FacebookAuthController@callback');

//Admin Login Register
Route::group(['prefix' => 'admin'], function (){
    Route::get('register', function () {
        return view('back.auth.register');
    });
    Route::post('register', 'Admin\RegisterController@create');
    Route::get('login', function (){
        return view('back.auth.login');
    });
    Route::post('login', 'Admin\LoginController@login');
    Route::get('logout', 'Admin\LoginController@logout');
});  

//Ecommerce Admin
Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return view('back.index');
        });

        Route::get('/products/dataTable','Admin\ProductsController@dataTable');
        Route::post('/products/update','Admin\ProductsController@update');
        Route::post('/products/changeStatus','Admin\ProductsController@changeStatus');
        Route::post('/products/delete','Admin\ProductsController@destroy');
        Route::resource('/products','Admin\ProductsController');
    });
});



