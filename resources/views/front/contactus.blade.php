@extends('front.layout')

@section('title') @endsection

@section('css')
@endsection

@section('content')
{{-- start content --}}
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="last_content">
                    <div class="col-sm-5">
                        <div class="page-header">
                            <h3>ที่อยู่สำหรับการติดต่อ</h3>
                        </div>
                        <div>
                          <p>
                            171/362  ถนนสมเด็จพระปิ่นเกล้า  แขวงอรุณอมรินทร์  เขตบางกอกน้อย กรุงเทพมหานคร 10700 <br/>

                            **ปรึกษาปัญหาผิว / สอบถามข้อมูลตัวแทนในเขตของท่าน
                          </p>

                        </div>
                        <div>
                            <label><i class="fa fa-phone" aria-hidden="true"></i> สายด่วน 092 449 1118</label>
                        </div>
                        <div>
                            <label><i class="fab fa-twitter" aria-hidden="true"></i> @medicavivathailand (มี "@" นำหน้าด้วยน๊า)</label>
                        </div>
                        <div>
                            <label><i class="fab fa-facebook-f" aria-hidden="true"></i><a href="#"> www.facebook.com/messages/medicavivathailand</a></label>
                        </div>
                        <div>
                          <label><i class="far fa-envelope"></i> medicavivathailand@gmail.com</label>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="page-header">
                            <h3>ติดต่อเรา</h3>
                        </div>
                        <form id="formid">
                            {{ csrf_field() }}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="ชื่อ-นามสกุล" required="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="tel" placeholder="Tel." required="">
                              </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="หัวเรื่อง" required="">
                                </div> <!-- end of form-group -->

                                <div class="form-group">
                                    <textarea class="form-control" name="detail" rows="4" placeholder="ข้อความ" required=""></textarea>
                                </div>

                                <div class="center-content">
                                    <button type="submit" class="btn-ghost btn-green">Submit</button>
                                </div>
                            </div>
                        </form>
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
$('#formid').submit(function (e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        method: "POST",
        url: url_gb + "/contactus",
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
