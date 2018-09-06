<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'คำสั่งซื้อ';
        $data['menu'] = 'orders';

        return view('back.orders',$data);
    }

    public function dataTable(){//Datatable
        $result = \App\Models\Orders::leftJoin('users', 'users.id', '=', 'orders.customer_id')
        ->select('orders.*',\DB::raw('FORMAT(orders.sum_price,2) AS sumprice'),'users.name AS uname');
        return Datatables::of($result)
        ->editColumn('status',function($rec){

            // <span class="badge badge-primary">Primary</span>
            // <span class="badge badge-secondary">Secondary</span>
            // <span class="badge badge-success">Success</span>
            // <span class="badge badge-danger">Danger</span>
            // <span class="badge badge-warning">Warning</span>
            // <span class="badge badge-info">Info</span>
            // <span class="badge badge-light">Light</span>
            // <span class="badge badge-dark">Dark</span>

            $str ='';
            if($rec->status=="m"){
                $str .='<span class="badge badge-primary">คำสั่งซื้อใหม่</span>';
            }else if($rec->status=="d"){
                $str .='<span class="badge badge-info">จ่ายเงินแล้ว</span>';
            }else if($rec->status=="s"){
                $str .='<span class="badge badge-success">เสร็จสิ้น</span>';
            }else if($rec->status=="n"){
                $str .='<span class="badge badge-warning">แจ้งการจ่ายเงิน</span>';
            }else{
                $str .='<span class="badge badge-danger">ยกเลิกคำสั่งซื้อ</span>';
            }

            return $str;

        })
        ->addColumn('action',function($rec){
            $str = "";
            $str .= ' <button class="btn btn-primary btn-sm checkmoney" data-id="'.$rec->order_id.'">
                        <i class="fa fa-money" aria-hidden="true"></i> ตรวจสอบเงิน
                    </button> ';
            $str .= ' <button class="btn btn-warning btn-sm edit-data" data-id="'.$rec->order_id.'">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข
                    </button> ';
                    
            $str .= ' <button class="btn  btn-danger btn-sm delete-data" data-id="'.$rec->order_id.'">
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
            if( \App\Models\Orders::insert($data) ){
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
        return \App\Models\Orders::where('id',$id)->first();
    }

    public function checkmoney($id)
    {
        return \App\Models\Payments::where('order_id',$id)
        ->leftjoin('bank','bank.bank_id','payments.bank_id')
        ->select('payments.*','bank.bank_name as bname')
        ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request['id'];
        unset($request['id']);
        $data = $request->all();

        \DB::beginTransaction();
        try {
            if( \App\Models\Orders::where("id",$id)->update($data) ){
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

    public function changeStatus(Request $request)
    {
        $update = ["status" => $request->status];
        \DB::beginTransaction();
        try {
            if( \App\Models\Orders::where('id',$request->id)->update($update) ){
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

    public function paymentConfirm(Request $request)
    {
        \DB::beginTransaction();
        try {

            $listPayment = \App\Models\Payments::where('order_id',$request->order_id)->get();
            
            foreach($listPayment as $payment){

                if(isset($request->payment_id)){
                    if(in_array($payment->payment_id,$request->payment_id)){
                    \App\Models\Payments::where([
                        ['order_id', '=', $payment->order_id],
                        ['payment_id', '=', $payment->payment_id],
                    ])
                    ->update(['payment_confirm' => 'T']);
                    }
                }else{
                    \App\Models\Payments::where([
                        // ['order_id', '=', $payment->order_id],
                        ['payment_id', '=', $payment->payment_id],
                    ])
                    ->update(['payment_confirm' => 'F']); 
                }

            }

            if($listPayment){
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
        $return['title'] = 'อัพเดทข้อมูล';
        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
            if( \App\Models\Orders::where('id',$request->id)->delete() ){
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
