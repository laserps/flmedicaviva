@extends('front.layout')

@section('title')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}
<section class="section">
    <div class="container">
        <form id="checkout">
            {{ csrf_field() }}
            @foreach(\Cart::content() as $k => $v)
            <div class="row" style="margin: 30px 0px;">
                <div class="col-md-2">
                    <div class="img-responsive">
                        <img style="width:100%;" src="{{asset('uploads/temp/'.$v->options->img)}}" >
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="page-header">
                        <h4> {{$v->name}} </h4>
                    </div>
                    <div class="col-md-12">
                        <div class="caption">
                            <!-- <h5>สินค้าคงคลัง 9 ชิ้น </h5> -->
                            <label class="price-sale">{{number_format($details->sell_price,2)}} บาท</label>
                            <label class="price">{{number_format($details->product_price,2)}} บาท</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="number" name="qty[{{$k}}]" placeholder="จำนวน" min="1" value="{{$v->qty}}">
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row col-md-12 text-center">
                <button type="submit" class="btn btn-success">ยืนยันรายการ</button>
            </div>
        </form>
    </div>
</section>
{{-- end content --}}
@endsection

@section('js')
<script src="{{asset('global/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">

$('button:submit').click(function(e) {
    e.preventDefault();
    $.ajax({
        method: "POST",
        url: url_gb + "/Checkout",
        data: $('form#checkout').serialize()
    }).done(function (rec) {
        alert('กำลังดำเนินการ');
        window.location.href = url_gb+'/payment';
    }).fail(function () {
        alert('ไม่สามารถทำรายการได้');
    });
});
</script>
@endsection
