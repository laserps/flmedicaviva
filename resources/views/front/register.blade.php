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
                                <form id="register">
                                    {{ csrf_field() }}
                                    <div class="header-register text-center">
                                        <h2>สมัครสมาชิก</h2>
                                        <br/>
                                    </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" placeholder="ชื่อ-นามสกุล" >
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="mobile" placeholder="เบอร์โทรศัพท์" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Email" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน" >
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" >
                                            </div>
                                        </div>

                                        <div class="center-content">
                                            <input type="submit" value="สมัครสมาชิก" class="btn-ghost btn-green">
                                        </div>

                                        <div class="center-content my-10">
                                        <span>หรือ</span>
                                        </div>
                                </form>
                                <div class="center-content">
                                    <button type="submit" data-toggle="modal" data-target="#myModal" class="btn-ghost btn-green">เข้าสู่ระบบ</button>
                                </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">เข้าสู่ระบบ</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="name" placeholder="รหัสผ่าน" >
                            </div>
                        </div>
                        <div class="center-content">
                            <input type="submit" value="เข้าสู่ระบบ" class="btn-ghost btn-green">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- end content --}}
@endsection

@section('js')
<script src="{{asset('global/jquery/dist/jquery.min.js')}}"></script>
<script>
$('#register').submit(function (e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        method: "POST",
        url: url_gb + "/member",
        dataType: 'json',
        data: $(this).serialize()
    }).done(function (rec) {
        if (rec.status == 0) {
            alert('Successfully');
            $('#formid').find('input, textarea').val('');
        } else {
            alert('Unsuccessfully request');
        }
    }).fail(function () {
        alert('Unsuccessfully request');
    });
});
</script>
@endsection
