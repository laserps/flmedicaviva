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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//FacebookAuthController
Route::get('/redirect', 'FacebookAuthController@redirect');
Route::get('/callback', 'FacebookAuthController@callback');

Route::get('/logout', function(){
    Auth::guard('admin')->logout();
    return redirect()->back();
});

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
            $data['menu'] = '';
            return view('back.index',$data);
        });

        //product order controller
        Route::get('/po/dataTable','Admin\ProductOrderController@dataTable');
        Route::post('/po/update','Admin\ProductOrderController@update');
        Route::post('/po/changeStatus','Admin\ProductOrderController@changeStatus');
        Route::post('/po/delete','Admin\ProductOrderController@destroy');
        Route::resource('/po','Admin\ProductOrderController');

        //member controller
        Route::get('/member/dataTable','Admin\MembersController@dataTable');
        Route::post('/member/update','Admin\MembersController@update');
        Route::post('/member/changeStatus','Admin\MembersController@changeStatus');
        Route::post('/member/delete','Admin\MembersController@destroy');
        Route::resource('/member','Admin\MembersController');

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

        //user controller
        Route::get('/users/dataTable','Admin\UsersController@dataTable');
        Route::post('/users/update','Admin\UsersController@update');
        Route::post('/users/changeStatus','Admin\UsersController@changeStatus');
        Route::post('/users/delete','Admin\UsersController@destroy');
        Route::resource('/users','Admin\UsersController');

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

        //orders controller
        Route::get('/orders/dataTable','OrdersController@dataTable');
        Route::post('/orders/update','OrdersController@update');
        Route::post('/orders/changeStatus','OrdersController@changeStatus');
        Route::post('/orders/delete','OrdersController@destroy');
        Route::resource('/orders','OrdersController');

        //staticpage controller
        Route::get('/stp/aboutus','Admin\StaticpageController@aboutus');
        Route::get('/stp/contact','Admin\StaticpageController@contact');
        Route::get('/stp/howbuy','Admin\StaticpageController@howbuy');
        Route::get('/stp/payment','Admin\StaticpageController@payment');
        Route::post('/stp/update','Admin\StaticpageController@update');
        

        Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
        Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    });
});

Route::post('/admin/upload' , 'UploadController@upload');

//OrakUploader
Route::any('/upload_file', 'OrakController@upload_file');

Route::get('/','StaticPageController@index');
Route::get('/agent','StaticPageController@agent');
Route::get('/product','StaticPageController@product');
Route::get('/payment','StaticPageController@payment');
Route::get('/aboutus','StaticPageController@aboutus');
Route::get('/contactus','StaticPageController@contactus');
Route::get('/howtobuy','StaticPageController@howtobuy');
Route::get('/member','StaticPageController@member');