@extends('front.layout')

@section('title')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}
    <div class="container">
        <div class="bg_navbar">
            <div class="row">
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="register_content">
                    <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        <div class="register-page">
                                <form id="updateUserData">
                                    {{ csrf_field() }}
                                    <div class="header-register text-center">
                                        <h2>แก้ไขข้อมูลสมาชิก</h2>
                                        <br/>
                                    </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="ชื่อ-นามสกุล" value="{{$data->name}}" >
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="mobile" placeholder="เบอร์โทรศัพท์" value="{{$data->mobile}}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address" placeholder="ที่อยู่" value="{{$data->address}}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control" name="sex">
                                                    <option value="">กรุณาเลือกเพศ</option>
                                                    <option value="M" {{($data->sex=='M')?'selected':''}}>ชาย</option>
                                                    <option value="W" {{($data->sex=='W')?'selected':''}}>หญิง</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="age" placeholder="อายุ" value="{{$data->age}}" >
                                            </div>
                                        </div>
                                        @if($address)
                                        @foreach($address as $k => $v)
                                        <div class="col-sm-12">
                                            <label for="">ที่อยู่ {{($k+1)}}</label>
                                            <input type="hidden" name="address[{{$k}}][id]" value="{{$v->id}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address[{{$k}}][address]" placeholder="" value="{{$v->address}}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address[{{$k}}][district]" placeholder="ตำบล" value="{{$v->district}}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address[{{$k}}][amphur]" placeholder="อำเภอ" value="{{$v->amphur}}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address[{{$k}}][province]" placeholder="จังหวัด" value="{{$v->province}}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address[{{$k}}][zipcode]" placeholder="รหัสไปรษณีย์" value="{{$v->zipcode}}" >
                                            </div>
                                        </div>

                                        @endforeach
                                        @endif
                                        <div class="left-content">
                                            <button type="button" name="button" class="btn btn-default" style="width:150px;height:40px;background-color:green;" id="add_address">เพิ่มที่อยู่</button>
                                        </div>
                                        <div class="center-content">
                                            <input type="submit" value="บันทึก" class="btn-ghost btn-green">
                                        </div>
                                </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
{{-- end content --}}
@endsection

@section('js')
<script src="{{asset('global/jquery/dist/jquery.min.js')}}"></script>
<script>
var address_index = {{sizeof($address)}};
$('#updateUserData').submit(function (e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        method: "POST",
        url: url_gb + "/updateUserData",
        dataType: 'json',
        data: $(this).serialize()
    }).done(function (rec) {
        if (rec.status == 1) {
            alert('แก้ไขข้อมูลสำเร็จ');
        } else if(rec.status == 2) {
            alert('ไม่สำเร็จ '+rec.content);
        } else {
            alert(rec.content);
        }
    }).fail(function () {
        alert('Unsuccessfully request');
    });
});
$('#login').submit(function (e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        method: "POST",
        url: "{{ route('login') }}",
        data: $(this).serialize()
    }).done(function (rec) {
        window.location.href = url_gb+'/';
    }).fail(function () {
        alert('Unsuccessfully request');
    });
});
</script>
@endsection
