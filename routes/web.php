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

        //product controller
        Route::get('/products/dataTable','Admin\ProductsController@dataTable');
        Route::post('/products/update','Admin\ProductsController@update');
        Route::post('/products/changeStatus','Admin\ProductsController@changeStatus');
        Route::post('/products/delete','Admin\ProductsController@destroy');
        Route::resource('/products','Admin\ProductsController');

        //agents controller
        Route::get('/agents/dataTable','Admin\AgentsController@dataTable');
        Route::post('/agents/update','Admin\AgentsController@update');
        Route::post('/agents/changeStatus','Admin\AgentsController@changeStatus');
        Route::post('/agents/delete','Admin\AgentsController@destroy');
        Route::resource('/agents','Admin\AgentsController');

        //categories controller
        Route::get('/categories/dataTable','Admin\CategoriesController@dataTable');
        Route::post('/categories/update','Admin\CategoriesController@update');
        Route::post('/categories/changeStatus','Admin\CategoriesController@changeStatus');
        Route::post('/categories/delete','Admin\CategoriesController@destroy');
        Route::resource('/categories','Admin\CategoriesController');

        //units controller
        Route::get('/units/dataTable','Admin\UnitsController@dataTable');
        Route::post('/units/update','Admin\UnitsController@update');
        Route::post('/units/changeStatus','Admin\UnitsController@changeStatus');
        Route::post('/units/delete','Admin\UnitsController@destroy');
        Route::resource('/units','Admin\UnitsController');

        //staticpage controller
        Route::get('/stp/aboutus','Admin\StaticpageController@aboutus');
        Route::get('/stp/contact','Admin\StaticpageController@contact');
        Route::get('/stp/howbuy','Admin\StaticpageController@howbuy');
        Route::get('/stp/payment','Admin\StaticpageController@payment');

        Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
        Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    });
});

