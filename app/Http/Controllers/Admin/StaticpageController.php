<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class StaticpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutus()
    {
        $data['title'] = 'เกี่ยวกับเรา';
        $data['menu'] = 'stp_aboutus';
        $data['stpvalue'] = \App\Models\StaticPage::where('name',$data['title'])->first();
        return view('back.setting.fetchPage',$data);
    }

    public function contact()
    {
        $data['title'] = 'ติดต่อเรา';
        $data['menu'] = 'stp_contact';
        $data['stpvalue'] = \App\Models\StaticPage::where('name',$data['title'])->first();
        return view('back.setting.fetchPage',$data);
    }

    public function howbuy()
    {
        $data['title'] = 'วิธีการซื้อสินค้า';
        $data['menu'] = 'stp_howbuy';
        $data['stpvalue'] = \App\Models\StaticPage::where('name',$data['title'])->first();
        return view('back.setting.fetchPage',$data);
    }

    public function payment()
    {
        $data['title'] = 'วิธีการชำระเงิน';
        $data['menu'] = 'stp_payment';
        $data['stpvalue'] = \App\Models\StaticPage::where('name',$data['title'])->first();
        return view('back.setting.fetchPage',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Models\Units::where('category_id',$id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id=null)
    {
        
        $check =  \App\Models\StaticPage::where('name',$request->name)->count();
        if($check>0){
            $name = $request['name'];
            $data = $request->all();
            \DB::beginTransaction();
            try {
                if( \App\Models\StaticPage::where("name",$name)->update($data) ){
                    \DB::commit();
                    $return['type'] = 'success';
                    $return['text'] = 'สำเร็จ';
                }else{
                    throw new $e;
                }
            }catch (\Exception $e){
                \DB::rollBack();
                $return['type'] = 'error';
                $return['text'] = 'ไม่สำเร็จ'."\n".$e->getMessage();
            }
            $return['title'] = 'แก้ไขข้อมูล';
            return $return;
        }else{
            $data = $request->all();
            $data['created_at'] = date('Y-m-d H:i:s');
    
            \DB::beginTransaction();
            try {
                if( \App\Models\StaticPage::insert($data) ){
                    \DB::commit();
                    $return['type'] = 'success';
                    $return['text'] = 'สำเร็จ';
                }else{
                    throw new $e;
                }
            } catch (\Exception $e){
                \DB::rollBack();
                $return['type'] = 'error';
                $return['text'] = 'ไม่สำเร็จ'."\n".$e->getMessage();
            }
            $return['title'] = 'เพิ่มข้อมูล';
            return $return;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        \DB::beginTransaction();
        try {
            if( \App\Models\Units::where('category_id',$request->id)->delete() ){
                \DB::commit();
                $return['type'] = 'success';
                $return['text'] = 'สำเร็จ';
            }else{
                throw new $e;
            }
        } catch (\Exception $e){
            \DB::rollBack();
            $return['type'] = 'error';
            $return['text'] = 'ไม่สำเร็จ'."\n".$e->getMessage();
        }
        $return['title'] = 'ลบข้อมูล';
        return $return;
    }
}
