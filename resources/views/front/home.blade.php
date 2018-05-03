@extends('front.layout')

@section('title') @endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}
    <!-- Slider Section -->
    <section id="header-slider" class="section section-slide">
        <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active"> <img  width="100%" src="{{asset('front/viva/images/Untitled-5.jpg')}}" alt="Chania"> </div>
                <div class="item "> <img  width="100%" src="{{asset('front/viva/images/banner-5.jpg')}}" alt="Chania"> </div>
            </div>
            <!-- Controls --> 
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span></a>
        </div>
    </section>
    <!-- Slider Section --> 

    <!-- Service Section -->
    <section id="services" class="section services">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="promotion-content">
                        <h4>โปรโมชั่นสินค้า</h4>
                        <div class="row"> 
                            <div class="col-md-6 col-sm-12">
                                <div class="promotion">
                                    <img src="{{asset('front/viva/images/promotion.png')}}" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="promotion">
                                    <img src="{{asset('front/viva/images/promotion.png')}}" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="promotion">
                                    <img src="{{asset('front/viva/images/promotion.png')}}" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="promotion">
                                    <img src="{{asset('front/viva/images/promotion.png')}}" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="services-content">
                        <h4>สินค้าทั้งหมด</h4>
                        <div class="row"> 
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <img src="{{asset('front/viva/images/pd1.jpg')}}" class="img-responsive">
                            </div>
                            <div class="title-product center-content">
                                <h5>สินค้าชิ้นที่ 1</h5>
                                <label class="price-sale" style="display: block;">1,200 บาท</label>
                                <label class="price">1,499 บาท</label>
                            </div>
                            <div class="center-content">
                                <a href="#" class="btn-ghost btn-green">สั่งซื้อสินค้า</a>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <img src="{{asset('front/viva/images/pd2.jpg')}}" class="img-responsive">
                            </div>
                            <div class="title-product center-content">
                                <h5>สินค้าชิ้นที่ 1</h5>
                                <label class="price-sale" style="display: block;">1,200 บาท</label>
                                <label class="price">1,499 บาท</label>
                            </div>
                            <div class="center-content">
                                <a href="#" class="btn-ghost btn-green">สั่งซื้อสินค้า</a>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <img src="{{asset('front/viva/images/pd3.jpg')}}" class="img-responsive">
                            </div>
                            <div class="title-product center-content">
                                <h5>สินค้าชิ้นที่ 1</h5>
                                <label class="price-sale" style="display: block;">1,200 บาท</label>
                                <label class="price">1,499 บาท</label>
                            </div>
                            <div class="center-content">
                                <a href="#" class="btn-ghost btn-green">สั่งซื้อสินค้า</a>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <img src="{{asset('front/viva/images/pd4.jpg')}}" class="img-responsive">
                            </div>
                            <div class="title-product center-content">
                                <h5>สินค้าชิ้นที่ 1</h5>
                                <label class="price-sale" style="display: block;">1,200 บาท</label>
                                <label class="price">1,499 บาท</label>
                            </div>
                            <div class="center-content">
                                <a href="#" class="btn-ghost btn-green">สั่งซื้อสินค้า</a>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <img src="{{asset('front/viva/images/pd1.jpg')}}" class="img-responsive">
                            </div>
                            <div class="title-product center-content">
                                <h5>สินค้าชิ้นที่ 1</h5>
                                <label class="price-sale" style="display: block;">1,200 บาท</label>
                                <label class="price">1,499 บาท</label>
                            </div>
                            <div class="center-content">
                                <a href="#" class="btn-ghost btn-green">สั่งซื้อสินค้า</a>
                            </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <img src="{{asset('front/viva/images/pd2.jpg')}}" class="img-responsive">
                            </div>
                            <div class="title-product center-content">
                                <h5>สินค้าชิ้นที่ 1</h5>
                                <label class="price-sale" style="display: block;">1,200 บาท</label>
                                <label class="price">1,499 บาท</label>
                            </div>
                            <div class="center-content">
                                <a href="#" class="btn-ghost btn-green">สั่งซื้อสินค้า</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="services-content center-content">
                        <h4>ติดต่อสั่งซื้อสินค้าช่องทางอื่น</h4>
                        <div class="contact-index">
                            <h5>Call Center : 02-334-5567</h5>
                            <h5>ID Line : @medicaviva_center</h5>
                        </div>
                        <div> 
                            <img class="index_line" src="{{asset('front/viva/images/line.jpg')}}" alt="line-qr">
                        </div>
                        <div>
                            <img src="{{asset('front/viva/images/add-friend-1.png')}}" class="add_line">
                        </div>
                    </div>
                    <div class="center-content">
                        <h5>ซื้อสินค้ากับตัวแทนจำหน่ายใกล้บ้าน</h5>
                        <div class="select-province">
                            <div class="col-sm-6 col-sm-offset-3">
                                <form>
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">เลือกจังหวัด</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>กรุงเทพมหานคร</option>
                                        <option>นครราชสีมา</option>
                                        <option>ปทุมธานี</option>
                                        <option>นนทบุรี</option>
                                        <option>สกลนคร</option>
                                    </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="center-content">
                                    <label>สมัครตัวแทนจำหน่าย </label> <a href="#" class="btn-ghost btn-green">คลิ๊ก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials section -->
    <section id="testimonials" class="section testimonials no-padding">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="flexslider">
                    <ul class="slides">
                    <li>
                        <div class="col-md-12">
                        <blockquote>
                            <h1>" Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec sed odio dui. Phasellus non dolor nibh. Nullam elementum Aenean eu leo quam " </h1>
                            <p> Rene Brown, Open Window production </p>
                        </blockquote>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12">
                        <blockquote>
                            <h1>"Cras dictum tellus dui, vitae sollicitudin ipsum. Phasellus non dolor nibh. Nullam elementum tellus pretium feugiat shasellus non dolor nibh. Nullam elementum tellus pretium feugiat." </h1>
                            <p>Brain Rice, Lexix Private Limited.</p>
                        </blockquote>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12">
                        <blockquote>
                            <h1>"Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur" </h1>
                            <p>Andi Simond, Global Corporate Inc </p>
                        </blockquote>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12">
                        <blockquote>
                            <h1>" Lorem ipsum dolor sit amet, consectetur adipiscing elitPhasellus non dolor nibh. Nullam elementum tellus pretium feugiat. Cras dictum tellus dui sollcitudin." </h1>
                            <p>Kristy Gabbor, Martix Media</p>
                        </blockquote>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials section -->     
{{-- end content --}}
@endsection

@section('js')
@endsection