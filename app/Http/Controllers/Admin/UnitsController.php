<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'หน่วยนับสินค้า';
        $data['menu'] = 'units';
        return view('back.setting.units',$data);
    }

    public function dataTable(){//Datatable
        $result = \App\Models\Units::select();
        return Datatables::of($result)
        ->editColumn('status',function($rec){

            $str ='<select name="status" onchange="changeStatus('.$rec->unit_id.',this.value);">';
            if($rec->status=="T"){
                $str .='<option value="T" selected>ทำงาน</option>';
                $str .='<option value="F">ไม่ทำงาน</option>';
            }else{
                $str .='<option value="T">ทำงาน</option>';
                $str .='<option value="F" selected>ไม่ทำงาน</option>';
            }
            $str .='</select>';
            return $str;

        })
        ->addColumn('action',function($rec){
            $str = "";
            $str .= ' <button class="btn btn-warning btn-sm edit-data" data-id="'.$rec->unit_id.'">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                    </button> ';
                    
            $str .= ' <button class="btn  btn-danger btn-sm delete-data" data-id="'.$rec->unit_id.'">
                        <i class="fa fa-trash" aria-hidden="true"></i> ลบ
                    </button> ';
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['status', 'action'])
        ->make(true);
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
        $data = $request->all();
        $data['created_at'] = date('Y-m-d H:i:s');

        \DB::beginTransaction();
        try {
            if( \App\Models\Units::insert($data) ){
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Models\Units::where('unit_id',$id)->first();
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
    public function update(Request $request)
    {
        $id = $request['unit_id'];
        unset($request['unit_id']);
        $data = $request->all();
        \DB::beginTransaction();
        try {
            if( \App\Models\Units::where("unit_id",$id)->update($data) ){
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $update = ["status" => $request->status];
        \DB::beginTransaction();
        try {
            if( \App\Models\Units::where('unit_id',$request->id)->update($update) ){
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
        $return['title'] = 'แก้ไขข้อมูล';
        return $return;
    }
    public function destroy(Request $request)
    {
        \DB::beginTransaction();
        try {
            if( \App\Models\Units::where('unit_id',$request->id)->delete() ){
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
