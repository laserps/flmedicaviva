<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.back')

@section('seo')
@endsection

@section('csstop')
@endsection

@section('content')
<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title"> {{$title}} </h1>
        <p class="title-description"> ระบบจัดการ{{$title}} </p>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm pull-right add-data">
                                +
                            </button>
                        </div>
                        <section class="example">
                            <div class=" table-responsive table-flip-scroll">
                                {{--  <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>
                                </table>  --}}
                                <table class="table table-striped table-hover table-sm" id="datatableAll">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">ชื่อ-นามสกุล{{$title}}</th>
                                            <th class="text-center">อายุ{{$title}}</th>
                                            <th class="text-center">เพศ{{$title}}</th>
                                            <th class="text-center">เบอร์โทร{{$title}}</th>
                                            <th class="text-center">อีเมล{{$title}}</th>
                                            <th class="text-center">ที่อยู่{{$title}}</th>
                                            <th class="text-center">วันที่เพิ่ม</th>
                                            <th class="text-center">สถานะ{{$title}}</th>
                                            <th class="text-center">การกระทำ</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Add -->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formAdd">
                    <div class="modal-header">
                        <h5>เพิ่ม{{$title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="user_firstname" class="col-sm-2 col-form-label">ชื่อ - นามสกุล{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="ชื่อ{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_lastname" class="col-sm-2 col-form-label">อายุ{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="age" placeholder="ชื่อ{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">เพศ{{$title}}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sex" value="M"> ชาย
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sex" value="F"> หญิง
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="google_latitute_longtitute" class="col-sm-2 col-form-label">เบอร์โทรศัพท์{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="mobile" placeholder="เบอร์โทรศัพท์ {{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="google_latitute_longtitute" class="col-sm-2 col-form-label">อีเมล{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" placeholder="อีเมล {{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="google_latitute_longtitute" class="col-sm-2 col-form-label">รหัสผ่าน{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" placeholder="รหัสผ่าน {{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">ที่อยู่{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="address" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">สถานะ{{$title}}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" value="T"> เปิดใช้งาน
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" value="F"> ไม่เปิดใช้งาน
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formEdit">
                    <div class="modal-header">
                        <h5>แก้ไข{{$title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="user_firstname" class="col-sm-2 col-form-label">ชื่อ - นามสกุล{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="user_id" name="id" placeholder="id_{{$title}}">
                            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_lastname" class="col-sm-2 col-form-label">อายุ{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="age" name="age" placeholder="ชื่อ{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">เพศ{{$title}}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline" id="sex">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sex" value="M"> ชาย
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sex" value="F"> หญิง
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="google_latitute_longtitute" class="col-sm-2 col-form-label">เบอร์โทรศัพท์{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="เบอร์โทรศัพท์ {{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="google_latitute_longtitute" class="col-sm-2 col-form-label">อีเมล{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="อีเมล {{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="google_latitute_longtitute" class="col-sm-2 col-form-label">รหัสผ่าน{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" placeholder="กรอกรหัสเพื่อทำการเปลี่ยนรหัสผ่านใหม่">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">ที่อยู่{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">สถานะ{{$title}}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline" id="status">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" value="T"> เปิดใช้งาน
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="status" value="F"> ไม่เปิดใช้งาน
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</article>

@endsection

@section('jsbottom')
<script type="text/javascript">
    {{-- Start  Add  --}}
    $( ".add-data" ).click(function() {
        document.getElementById('formAdd').reset();
        $( "#modalAdd" ).modal( "show" );
    });
    $( "#formAdd" ).validate({
        rules: {
            user_name: "required",
            user_price: "required",
        },
        messages: {
            user_name: "กรุณาระบุ",
            user_price: "กรุณาระบุ",
        },
        errorElement: "span",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents('.form-group').addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents('.form-group').addClass( "has-success" ).removeClass( "has-error" );
        },
        submitHandler: function(form){
            var btn = $(form).find('[type="submit"]');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method : "POST",
                url : url+"/admin/users",
                dataType : 'json',
                data : $(form).serialize()
            }).done(function(rec){
                if(rec.type == 'success'){
                    swal({
                        confirmButtonText:'ตกลง',title: rec.title,text: rec.text,type: rec.type
                    });
                    $('#modalAdd').modal('hide');
                    dataTable.api().ajax.reload();
                    form.reset();
                }else{
                    swal({
                        confirmButtonText:'ตกลง',title: rec.title,text: rec.text,type: rec.type
                    });
                }
            });
        }
    });
    {{--  End Add  --}}

    {{--  Start Edit  --}}
    $('body').on('click', '.edit-data', function(){
        var id = $(this).data('id');
        document.getElementById('formEdit').reset();
        $.ajax({
            method : "GET",
            url : url+"/admin/users/"+id,
            dataType : 'json'
        }).done(function(rec){
            $( "#user_id" ).val( rec.id );
            $( "#name" ).val( rec.name );
            $( "#age" ).val( rec.age );
            $("#sex input[value="+rec.sex+"]").prop('checked', true);
            $( "#mobile" ).val( rec.mobile );
            $( "#email" ).val( rec.email );
            $( "#address" ).val( rec.address );
            //$( "#user_image" ).val(  );
            $("#status input[value="+rec.status+"]").prop('checked', true);

            $( "#modalEdit" ).modal( "show" );
        });
    });
    $( "#formEdit" ).validate({
        rules: {
            user_name: "required",
            user_price: "required",
        },
        messages: {
            user_name: "กรุณาระบุ",
            user_price: "กรุณาระบุ",
        },
        errorElement: "span",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents('.form-group').addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents('.form-group').addClass( "has-success" ).removeClass( "has-error" );
        },
        submitHandler: function(form){
            var btn = $(form).find('[type="submit"]');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method : "POST",
                url : url+"/admin/users/update",
                dataType : 'json',
                data : $(form).serialize()
            }).done(function(rec){
                if(rec.type == 'success'){
                    swal({
                        confirmButtonText:'ตกลง',title: rec.title,text: rec.text,type: rec.type
                    });
                    $('#modalEdit').modal('hide');
                    dataTable.api().ajax.reload();
                }else{
                    swal({
                        confirmButtonText:'ตกลง',title: rec.title,text: rec.text,type: rec.type
                    });
                }
            });
        }
    });
    {{--  End Edit  --}}

    {{--  Start Delete  --}}
    $('body').on('click', '.delete-data',function(){
        var id = $(this).data('id');
        swal({
            title: 'คุณต้องการลบข้อมูลหรือไม่ ?',
            text: "หากต้องการลบ กดปุ่ม 'ยืนยัน'",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.value==true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method : "post",
                    url : url+"/admin/users/delete",
                    dataType : 'json',
                    data : {'id':id}
                }).done(function(rec){
                    if(rec.type=='success'){
                        swal({
                            confirmButtonText:'ตกลง',title: rec.title,text: rec.text,type: rec.type
                        });
                        dataTable.api().ajax.reload();
                    }else{
                        swal(rec.title,rec.text,rec.type);
                    }
                });
            }
        });
    });
    {{--  End Delete  --}}

    {{--  Start Status  --}}
    function changeStatus(id,value){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method : "post",
            url : url+"/admin/users/changeStatus",
            dataType : 'json',
            data : {
                'id':id,
                'status':value
            }
        }).done(function(rec){
            if(rec.type=='success'){
                swal({
                    confirmButtonText:'ตกลง',title: rec.title,text: rec.text,type: rec.type
                });
                dataTable.api().ajax.reload();
            }else{
                swal(rec.title,rec.text,rec.type);
            }
        });
    }
    {{--  End Status  --}}
</script>

<!-- datatables -->
<script src="{{asset('global/datatables.net/js/jquery.dataTables.js')}}"></script>
<script>
    var dataTable = $('#datatableAll').dataTable({
        "focusInvalid": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": url+"/admin/users/dataTable",
            "data": function ( d ) {
            }
        },
        "columns": [
            { "data": "DT_Row_Index" , "name": "DT_Row_Index" , "className": "text-center", "orderable": false , "searchable": false },
            { "data": "name" , "name":"name" },
            { "data": "age" , "name":"age" },
            { "data": "sex" , "name":"sex" },
            { "data": "mobile" , "name":"mobile" },
            { "data": "email" , "name":"email" },
            { "data": "address" , "name":"address" , "className": "text-ritght"},
            { "data": "created_at" , "name":"created_at" , "className": "text-center"},
            { "data": "status" , "name":"status" , "className": "text-center"},
            { "data": "action" , "name":"action" , "className": "text-center" ,"orderable": false, "searchable": false },
        ],
        "language": {
            "paginate": {
                "previous": "ก่อน",
                "next": "ต่อไป"
            },
            "lengthMenu": "แสดง _MENU_ รายการ ต่อ หน้า",
            "search": "ค้นหา",
            "zeroRecords": "ไม่พบข้อมูล - ขออภัย",
            "info": "แสดง หน้า _PAGE_ จาก _PAGES_",
            "infoEmpty": "ไม่มีข้อมูลบันทึก",
            "infoFiltered": "(ค้นหา จากทั้งหมด _MAX_ รายการ)",
        },
        responsive: true,
        "drawCallback": function( settings ) {
        }
    });
</script>
@endsection
