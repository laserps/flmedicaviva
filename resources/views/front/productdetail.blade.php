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
    <div class="row" style="margin: 30px 0px;">
      <div class="col-md-6">
        <div class="img-responsive">
          <img src="images/pd1.jpg" >
        </div>
      </div>
      <div class="col-md-6">
        <div class="page-header">
          <h4> {{$details->product_name}} </h4>
          <p>รายละเอียดสินค้า</p>
        </div>
        <div class="col-md-12">
          <div class="caption">
            <p>
              {{$details->short_description}}
            </p>
            <!-- <h5>สินค้าคงคลัง 9 ชิ้น </h5> -->
            <label class="price-sale">{{number_format($details->sell_price,2)}} บาท</label>
            <label class="price">{{number_format($details->product_price,2)}} บาท</label>
          </div>
        </div>
        <div class="col-md-12">
            {{ csrf_field() }}
            <input type="number" name="qty" id="qty" placeholder="จำนวน" min="1" value="1">
          <button class="btn-ghost btn-green product_id" data-id="{{$details->product_id}}">สั่งซื้อสินค้า</button>
        </div>

      </div>
    </div>
  </div>

  <div class="container" style="margin-top: 30px;">
    <div class="row">
      <div class="col-md-12">
      <!-- Nav tabs -->
      <div class="card">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#details" aria-controls="details" role="tab" data-toggle="tab">รายละเอียดสินค้า</a>
            </li>
            <li role="presentation">
              <a href="#quantity" aria-controls="quantity" role="tab" data-toggle="tab">คุณสมบัติ</a>
            </li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="details">
              {{$details->description}}
            </div>
            <div role="tabpanel" class="tab-pane" id="quantity">
              {{$details->properties}}
            </div>

        </div>
      </div>
      </div>
    </div>
  </div>
</section>
{{-- end content --}}
@endsection

@section('js')
<script type="text/javascript">
    $('button.product_id').click(function() {
        $.ajax({
            url: url_gb+'/'+$('.product_id').data('id')+'/addProduct'+'/'+$('#qty').val(),
            method: 'POST',
            data: {
                '_token' : $("[name='_token']").val(),
            },
            success: function(rec) {
                if(rec) {
                    alert('เพิ่มสินค้าแล้ว');
                    $('#qty').val(1);
                }
            }
        })
    });
</script>
@endsection
