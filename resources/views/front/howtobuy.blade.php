@extends('front.layout')

@section('title') @endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}
    <section class="section" id="howtobuy">
        <div class="container">
          <div class="row center-content">
            <div class="page-header">
                <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> วิธีการซื้อสินค้า</h4>
            </div>
            <div class="col-md-3">
              <div class="thumbnail">
                <img src="{{asset('front/viva/images/htb1.png')}}" alt="...">
                <div class="caption">
                    <h4>เลือกสินค้าที่ต้องการ</h4>
                    <p>เลือกสินค้าที่ต้องการ เลือกสินค้าที่ต้องการ</p>
                    <p></p>
                </div>
              </div>
            </div>
  
            <div class="col-md-3">
              <div class="thumbnail">
                <img src="{{asset('front/viva/images/htb2.png')}}" alt="...">
                <div class="caption">
                    <h4>กดยืนยันการสั่งซื้อ</h4>
                    <p>กดยืนยันการสั่งซื้อ กดยืนยันการสั่งซื้อ</p>
                    <p></p>
                </div>
              </div>
            </div>
  
            <div class="col-md-3">
              <div class="thumbnail">
                <img src="{{asset('front/viva/images/htb3.png')}}" alt="...">
                <div class="caption">
                    <h4>ชำระเงิน</h4>
                    <p>ชำระเงินได้หลากหลายช่องทาง</p>
                    <p></p>
                </div>
              </div>
            </div>
  
            <div class="col-md-3">
              <div class="thumbnail">
                <img src="{{asset('front/viva/images/htb4.png')}}" alt="...">
                <div class="caption">
                    <h4>รอรับสินค้าได้เลย</h4>
                    <p>สินค้าส่งตรงถึงบ้านคุณ</p>
                    <p></p>
                </div>
              </div>
            </div>
          </div>
  
          <div class="row center-content">
            <div class="page-header">
              <h4><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> วิธีการชำระเงิน</h4>
            </div>
            <div>
                <h5>1. เลือกธนาคารที่คุณสะดวกเพื่อโอนเงิน (กดดูรายละเอียดธนาคาร)</h5>
                <h5>2. เลือกรายการสั่งซื้อเพื่อแจ้งชำระเงิน (ควรเท่ากับยอดโอนเงิน)</h5>
                <h5>3. ลูกค้า Login เข้าสู่ระบบ (Member) - สามารถคลิกเลือกรายการสั่งซื้อรวมหลายรายการได้</h5>
                <h5>4. ลูกค้าไม่ได้ Login เข้าสู่ระบบ (Guest) - กรอกรหัสรายการสั่งซื้อ (OrderID) ได้ครั้งละ 1 รายการ</h5>
                <h5>5. กดปุ่ม "แจ้งชำระเงิน" ระบบจะพาคุณไปยังเว็บไซต์ LnwPay</h5>
                <h5>6. กรอกรายละเอียดการโอนให้ครบถ้วนสมบูรณ์</h5>
                <h5>7. หลังจากแจ้งชำระเงินเรียบร้อยแล้ว ทีมงาน LnwPay จะตรวจสอบและแจ้งผลการตรวจสอบให้ทางอีเมลภายใน 24 ชม.</h5>
            </div>
          </div>
        </div>
    </section>    
{{-- end content --}}
@endsection

@section('js')
@endsection