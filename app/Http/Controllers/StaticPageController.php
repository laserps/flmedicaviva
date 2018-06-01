<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home');
    }


    // Route::get('/','StaticPageController@index');
    // Route::get('/agent','StaticPageController@agent');
    // Route::get('/product','StaticPageController@product');
    // Route::get('/payment','StaticPageController@payment');
    // Route::get('/aboutus','StaticPageController@aboutus');
    // Route::get('/contactus','StaticPageController@contactus');
    // Route::get('/howtobuy','StaticPageController@howtobuy');
    // Route::get('/member','StaticPageController@member');
    
    // Route::get('/agent',function(){
    //     return View::make('front.authorized');
    // });
    // Route::get('/product',function(){
    //     return \View::make('front.product');
    // });
    // Route::get('/payment',function(){
    //     return \View::make('front.payment');
    // });
    // Route::get('/aboutus',function(){
    //     return \View::make('front.aboutus');
    // });
    // Route::get('/contactus',function(){
    //     return \View::make('front.contactus');
    // });
    // Route::get('/howtobuy',function(){
    //     return \View::make('front.howtobuy');
    // });
    // Route::get('/member',function(){
    //     return \View::make('front.register');
    // });

    public function agent()
    {
        return View::make('front.authorized');
    }

    public function product()
    {
        return \View::make('front.product');
    }

    public function payment()
    {
        return \View::make('front.payment');
    }

    public function aboutus()
    {
        return \View::make('front.aboutus');
    }

    public function contactus()
    {
        return \View::make('front.contactus');
    }

    public function howtobuy()
    {
        return \View::make('front.howtobuy');
    }

    public function member()
    {
        return \View::make('front.register');
    }


}
