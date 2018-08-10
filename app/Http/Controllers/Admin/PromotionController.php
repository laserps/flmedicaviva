<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'โปรโมชั่น';
        $data['menu'] = 'promotions';
        $data['products'] = \App\Models\Products::get();
        return view('back.promotions',$data);
    }

    public function dataTable(){//Datatable
        $result = \App\Models\Promotions::select();
        return Datatables::of($result)
        ->editColumn('promotion_picture',function($rec){
            return "<img src='".asset('uploads/temp/'.$rec->promotion_picture)."' width='150'>";
        })
        ->editColumn('promotion_item',function($rec){
            $str='';
            $a = json_decode($rec->promotion_item);
            foreach($a as $key=>$pi){
                $str .= ($key+1).".) ";
                $str .= \App\Models\Products::where('product_id',$pi->product_id)->first()->product_name;
                $str .= "(".$pi->qty.")";
                if(count($a)!=$key+1){
                    $str .= "<hr>";
                } 
            }
            return $str;
        })
        ->editColumn('status',function($rec){
            $str ='<select name="status" onchange="changeStatus('.$rec->promotion_id.',this.value);">';
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
            $str .= ' <button class="btn btn-warning btn-sm edit-data" data-id="'.$rec->promotion_id.'">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                    </button> ';
                    
            $str .= ' <button class="btn  btn-danger btn-sm delete-data" data-id="'.$rec->promotion_id.'">
                        <i class="fa fa-trash" aria-hidden="true"></i> ลบ
                    </button> ';
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['status', 'action','promotion_picture','promotion_item'])
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
        $photo = $request->promotion_picture;
        $product_items = $request->promotion_item;
        $qty = $request->qty;
        unset($data['promotion_item']);
        foreach($product_items as $key => $item){
            $data['promotion_item'][] = [
                'product_id' => $item,
                'qty' => $qty[$key]
            ];
        }
        // return $data['promotion_item'];
        $data['promotion_item'] = json_encode($data['promotion_item']);

        if(isset($photo[0])){   $data['promotion_picture'] = $photo[0]; }
        // unset($data['promotion_picture']);
        unset($data['qty']);
        \DB::beginTransaction();
        try {
            if( \App\Models\promotions::insert($data) ){
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
        $data['promotion'] = \App\Models\Promotions::where('promotion_id',$id)->first();
        $data['products'] = \App\Models\Products::get();
        return $data;
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
        $id = $request['promotion_id'];
        unset($request['promotion_id']);
        $data = $request->all();

        $data['created_at'] = date('Y-m-d H:i:s');
        $photo = $request->promotion_picture_edit;
        $product_items = $request->promotion_item;
        $qty = $request->qty;
        unset($data['promotion_item']);
        foreach($product_items as $key => $item){
            $data['promotion_item'][] = [
                'product_id' => $item,
                'qty' => $qty[$key]
            ];
        }
        // return $data['promotion_item'];
        $data['promotion_item'] = json_encode($data['promotion_item']);

        if(isset($photo[0])){   $data['promotion_picture'] = $photo[0]; }
        unset($data['promotion_picture_edit']);
        unset($data['qty']);
        \DB::beginTransaction();
        try {
            if( \App\Models\promotions::where("promotion_id",$id)->update($data) ){
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
            if( \App\Models\promotions::where('promotion_id',$request->id)->update($update) ){
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
            if( \App\Models\promotions::where('promotion_id',$request->id)->delete() ){
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