@extends('front.layout')

@section('title') @endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}{
<!-- Header Section --> 
    <section class="section" id="author">
        <div class="container">
            <div class="row center-content">
                <div class="page-header">
                    <h4>ตัวแทนจำหน่าย</h4>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('front/viva/images/dealer01.png')}}" class="img-circle" alt="...">
                        <div class="caption">
                        <h4>ตัวแทนคนที่ 1</h4>
                        <a href="#">
                            <img src="{{asset('front/viva/images/add-friend-1.png')}}" class="add_line">
                        </a>
                        <p>เลือกสินค้าที่ต้องการ เลือกสินค้าที่ต้องการ</p>
                        <p></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('front/viva/images/dealer02.png')}}"  class="img-circle" alt="...">
                        <div class="caption">
                            <h4>ตัวแทนคนที่ 2</h4>
                            <a href="#">
                                <img src="{{asset('front/viva/images/add-friend-1.png')}}" class="add_line">
                            </a>
                            <p>กดยืนยันการสั่งซื้อ กดยืนยันการสั่งซื้อ</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('front/viva/images/dealer03.png')}}" class="img-circle"alt="...">
                        <div class="caption">
                            <h4>ตัวแทนคนที่ 3</h4>
                            <a href="#">
                                <img src="{{asset('front/viva/images/add-friend-1.png')}}" class="add_line">
                            </a>
                            <p>ชำระเงินได้หลากหลายช่องทาง</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('front/viva/images/dealer04.png')}}" class="img-circle" alt="...">
                        <div class="caption">
                            <h4>ตัวแทนคนที่ 4</h4>
                            <a href="#">
                                <img src="{{asset('front/viva/images/add-friend-1.png')}}" class="add_line">
                            </a>
                            <p>สินค้าส่งตรงถึงบ้านคุณ</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('front/viva/images/dealer01.png')}}" class="img-circle" alt="...">
                        <div class="caption">
                            <h4>ตัวแทนคนที่ 5</h4>
                            <a href="#">
                                <img src="{{asset('front/viva/images/add-friend-1.png')}}" class="add_line">
                            </a>
                            <p>กดยืนยันการสั่งซื้อ กดยืนยันการสั่งซื้อ</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset('front/viva/images/dealer02.png')}}" class="img-circle" alt="...">
                            <div class="caption">
                            <h4>ตัวแทนคนที่ 6</h4>
                            <a href="#">
                                <img src="{{asset('front/viva/images/add-friend-1.png')}}" class="add_line">
                            </a>
                            <p>ชำระเงินได้หลากหลายช่องทาง</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
{{-- end content --}}
@endsection

@section('js')
@endsection