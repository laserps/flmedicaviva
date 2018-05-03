@extends('front.layout')

@section('title') @endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}
    <section class="section" id="author">
        <div class="container">
          <div class="row center-content">
            <div class="page-header">
              <h4>สินค้าทั้งหมด</h4>
            </div>
            
            <div class="row">
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{asset('front/viva/images/pd1.jpg')}}" alt="...">
                  <div class="caption">
                    <h4>สินค้า 1</h4>
                    <label class="price-sale" style="display: block;">1,200 บาท</label>
                    <label class="price">1,499 บาท</label>
                    <p>เลือกสินค้าที่ต้องการ เลือกสินค้าที่ต้องการ</p>
                    <p></p>
                  </div>
                  <div>
                    <button class="btn-ghost btn-green"> สั่งซื้อ </button>
                  </div>
                </div>
              </div>
  
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{asset('front/viva/images/pd2.jpg')}}" alt="...">
                  <div class="caption">
                    <h4>สินค้า 2</h4>
                    <label class="price-sale" style="display: block;">1,200 บาท</label>
                    <label class="price">1,499 บาท</label>
                    <p>กดยืนยันการสั่งซื้อ กดยืนยันการสั่งซื้อ</p>
                  </div>
                  <button class="btn-ghost btn-green"> สั่งซื้อ </button>
                </div>
              </div>
  
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{asset('front/viva/images/pd3.jpg')}}" alt="...">
                  <div class="caption">
                    <h4>สินค้า 3</h4>
                    <label class="price-sale" style="display: block;">1,200 บาท</label>
                    <label class="price">1,499 บาท</label>
                    <p>ชำระเงินได้หลากหลายช่องทาง</p>
                    <p></p>
                  </div>
                  <button class="btn-ghost btn-green"> สั่งซื้อ </button>
                </div>
              </div>
  
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{asset('front/viva/images/pd4.jpg')}}" alt="...">
                  <div class="caption">
                    <h4>สินค้า 4</h4>
                    <label class="price-sale" style="display: block;">1,200 บาท</label>
                    <label class="price">1,499 บาท</label>
                    <p>สินค้าส่งตรงถึงบ้านคุณ</p>
                    <p></p>
                  </div>
                  <button class="btn-ghost btn-green"> สั่งซื้อ </button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{asset('front/viva/images/pd1.jpg')}}" alt="...">
                  <div class="caption">
                    <h4>สินค้า 5</h4>
                    <label class="price-sale" style="display: block;">1,200 บาท</label>
                    <label class="price">1,499 บาท</label>
                    <p>กดยืนยันการสั่งซื้อ กดยืนยันการสั่งซื้อ</p>
                    <p></p>
                  </div>
                  <button class="btn-ghost btn-green"> สั่งซื้อ </button>
                </div>
              </div>
  
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{asset('front/viva/images/pd4.jpg')}}" alt="...">
                  <div class="caption">
                    <h4>สินค้า 6</h4>
                    <label class="price-sale" style="display: block;">1,200 บาท</label>
                    <label class="price">1,499 บาท</label>
                    <p>ชำระเงินได้หลากหลายช่องทาง</p>
                    <p></p>
                  </div>
                  <button class="btn-ghost btn-green"> สั่งซื้อ </button>
                </div>
              </div>
  
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{asset('front/viva/images/pd4.jpg')}}" alt="...">
                    <div class="caption">
                      <h4>สินค้า 7</h4>
                      <label class="price-sale" style="display: block;">1,200 บาท</label>
                      <label class="price">1,499 บาท</label>
                      <p>สินค้าส่งตรงถึงบ้านคุณ</p>
                      <p></p>
                    </div>
                    <button class="btn-ghost btn-green"> สั่งซื้อ </button>
                </div>
              </div>
  
              <div class="col-md-3">
                <div class="thumbnail">
                  <img src="{{asset('front/viva/images/pd4.jpg')}}" alt="...">
                  <div class="caption">
                    <h4>สินค้า 4</h4>
                    <label class="price-sale" style="display: block;">1,200 บาท</label>
                    <label class="price">1,499 บาท</label>
                    <p>สินค้าส่งตรงถึงบ้านคุณ</p>
                    <p></p>
                  </div>
                  <button class="btn-ghost btn-green"> สั่งซื้อ </button>
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