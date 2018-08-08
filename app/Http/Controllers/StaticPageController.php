<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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

    public function contactUsStore(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        \DB::beginTransaction();
        try {
            if( \App\Models\Contact::insert($data) ){
                \DB::commit();
                $return['type'] = 'success';
                $return['status'] = 0;
                $return['text'] = 'สำเร็จ';
            }else{
                throw new $e;
                $return['status'] = 1;
            }
        } catch (\Exception $e){
            \DB::rollBack();
            $return['status'] = 1;
            $return['type'] = 'error';
            $return['text'] = 'ไม่สำเร็จ'."\n".$e->getMessage();
        }
        $return['title'] = 'เพิ่มข้อมูล';
        return $return;
    }

    public function memberStore(Request $request) {
        $input_all = $request->all();
        unset($input_all['_token']);
        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['password'] = \Hash::make($input_all['password']);
        $input_all['updated_at'] = date('Y-m-d H:i:s');
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'password' =>'required|confirmed',
            'name' => 'required',
            'mobile' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                unset($input_all['password_confirmation']);
                $data_insert = $input_all;
                \App\Models\User::insert($data_insert);
                \DB::commit();
                $return['status'] = 0;
                $return['content'] = '';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 1;
                $return['content'] = ''. $e->getMessage();
            }
        } else {
            $failedRules = $validator->failed();
            if (isset($failedRules['email']['Required'])) {
                $return['status'] = 2;
                $return['content'] = '';
            } elseif (isset($failedRules['email']['Unique'])) {
                $return['status'] = 2;
                $return['content'] = '';
            } elseif (isset($failedRules['email']['Email'])) {
                $return['status'] = 2;
                $return['content'] = '';
            } elseif (isset($failedRules['password']['Required'])) {
                $return['status'] = 2;
                $return['content'] = '';
            } elseif (isset($failedRules['mobile']['Required'])) {
                $return['status'] = 2;
                $return['content'] = '';
            } elseif (isset($failedRules['name']['Required'])) {
                $return['status'] = 2;
                $return['content'] = '';
            } elseif (isset($failedRules['password']['Confirmed'])) {
                $return['status'] = 2;
                $return['content'] = '';
            } else {
                $return['status'] = 0;
            }
        }
        $return['title'] = '';
        return json_encode($return);
    }
}
