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

    public function agent()
    {
        $data['Agents'] = \App\Models\Agents::get();
        return view('front.authorized',$data);
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
