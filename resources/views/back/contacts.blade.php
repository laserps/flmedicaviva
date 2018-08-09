<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.back')

@section('seo')
@endsection

@section('csstop')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  <link rel="stylesheet" href="{{asset('global/bootstrap/dist/css/bootstrap.css')}}">  --}}
    <script src="{{asset('global/dropzone/dropzone.js')}}"></script>
    <link href="{{asset('global/dropzone/dropzone.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('global/orakuploader/orakuploader.css')}}">
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
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content table-sm" id="datatableAll">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">ชื่อ-นามสกุล{{$title}}</th>
                                            <th class="text-center">อีเมล{{$title}}</th>
                                            <th class="text-center">เบอร์โทร{{$title}}</th>
                                            <th class="text-center">หัวเรื่อง{{$title}}</th>
                                            <th class="text-center">รายละเอียด{{$title}}</th>
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


                    <div class="modal-header">
                        <h5>เพิ่ม{{$title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAdd" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">ชื่อ-นามสกุล{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="ชื่อ-นามสกุล{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">อีเมล{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" placeholder="อีเมล{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-sm-2 col-form-label">เบอร์โทร{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" placeholder="เบอร์โทร{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">หัวเรื่อง{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="หัวเรื่อง{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail" class="col-sm-2 col-form-label">รายละเอียด{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="detail" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remark" class="col-sm-2 col-form-label">คำแนะนำ{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="remark" rows="3"></textarea>
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
                    <input type="hidden" name="id" id="contact_id">
                    <div class="modal-header">
                        <h5>เพิ่ม{{$title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">ชื่อ-นามสกุล{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" id="name" class="form-control" name="name" placeholder="ชื่อ-นามสกุล{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">อีเมล{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" id="email" class="form-control" name="email" placeholder="อีเมล{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-sm-2 col-form-label">เบอร์โทร{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" id="tel" class="form-control" name="tel" placeholder="เบอร์โทร{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">หัวเรื่อง{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="text" id="title" class="form-control" name="title" placeholder="หัวเรื่อง{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail" class="col-sm-2 col-form-label">รายละเอียด{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remark" class="col-sm-2 col-form-label">คำแนะนำ{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
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
{{--  <script src="{{asset('global/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>  --}}
{{--  <script src="{{asset('global/clipboard/dist/clipboard.min.js')}}"></script>  --}}
{{--  <script>
    Dropzone.options.myDropzone = {
        paramName: 'file',
        maxFilesize: 5, // MB
        maxFiles: 20,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
            this.on("success", function(file, response) {
                var a = document.createElement('span');
                a.className = "thumb-url btn btn-primary";
                a.setAttribute('data-clipboard-text','{{url("/uploads")}}/'+response);
                a.innerHTML = "copy url";
                file.previewTemplate.appendChild(a);
            });
        }
    };
</script>  --}}
{{--  <script>
    $('.thumb-url').tooltip({
        trigger: 'click',
        placement: 'bottom'
    });

    function setTooltip(btn, message) {
        $(btn).tooltip('hide')
            .attr('data-original-title', message)
            .tooltip('show');
    }

    function hideTooltip(btn) {
        setTimeout(function() {
            $(btn).tooltip('hide');
        }, 500);
    }

    var clipboard = new Clipboard('.thumb-url');

    clipboard.on('success', function(e) {
        e.clearSelection();
        setTooltip(e.trigger, 'Copied!');
        hideTooltip(e.trigger);
    });

    clipboard.on('error', function(e) {
        e.clearSelection();
        setTooltip(e.trigger, 'Failed');
        hideTooltip(e.trigger);
    });
</script>  --}}
<script>
    // $('#file-0a').fileinput({
    //     theme: 'fa',
    //     language: 'th',
    //     uploadUrl: "{{url('/uploadfile')}}",
    //     allowedFileExtensions: ['jpg', 'png', 'gif']
    // });
</script>
<script type="text/javascript">
    {{-- Start  Add  --}}
    $( ".add-data" ).click(function() {
        document.getElementById('formAdd').reset();
        $( "#modalAdd" ).modal( "show" );
    });
    $( "#formAdd" ).validate({
        rules: {
            name: "required",
            email: "required",
            title: "required",
            detail: "required",
        },
        messages: {
            name: "กรุณาระบุ",
            email: "กรุณาระบุ",
            title: "กรุณาระบุ",
            detail: "กรุณาระบุ",
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
                url : url+"/admin/contacts",
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
            url : url+"/admin/contacts/"+id,
            dataType : 'json'
        }).done(function(rec){
            $( "#contact_id" ).val( id );
            $( "#name" ).val( rec.name );
            $( "#email" ).val( rec.email );
            $( "#tel" ).val( rec.tel );
            $( "#title" ).val( rec.title );
            $( "#detail" ).val( rec.detail );
            $( "#remark" ).val( rec.remark );
            $( "#modalEdit" ).modal( "show" );
        });
    });
    $( "#formEdit" ).validate({
        rules: {
            name: "required",
            email: "required",
            title: "required",
            detail: "required",
        },
        messages: {
            name: "กรุณาระบุ",
            email: "กรุณาระบุ",
            title: "กรุณาระบุ",
            detail: "กรุณาระบุ",
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
                url : url+"/admin/contacts/update",
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
                    url : url+"/admin/contacts/delete",
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

</script>

<!-- datatables -->
<script src="{{asset('global/datatables.net/js/jquery.dataTables.js')}}"></script>
<script>
    var dataTable = $('#datatableAll').dataTable({
        //"focusInvalid": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": url+"/admin/contacts/dataTable",
            // "data": function ( d ) {
            // }
        },
        "columns": [
            { "data": "DT_Row_Index" , "name": "DT_Row_Index" , "className": "text-center", "orderable": false , "searchable": false },
            { "data": "name" , "className": "text-center",},
            { "data": "email" },
            { "data": "tel" , "className": "text-ritght"},
            { "data": "title" },
            { "data": "detail" },
            { "data": "read", "searchable": false },
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
<script src="{{asset('global/orakuploader/jquery-ui.min.js')}}"></script>
<script src="{{asset('global/orakuploader/orakuploader.js')}}"></script>
<script src="{{asset('global/orakuploader/adminusage.js')}}"></script>
{{-- <script>
    $('#photo').orakuploader({
        orakuploader_path         : url+'/',
        orakuploader_ckeditor         : true,
        orakuploader_use_dragndrop            : true,
        orakuploader_use_sortable   : false,
        orakuploader_main_path : 'uploads/temp/',
        orakuploader_thumbnail_path : 'uploads/temp/',
        orakuploader_thumbnail_real_path : asset+'uploads/temp/',
        orakuploader_loader_image       : asset+'images/loader.gif',
        orakuploader_no_image       : asset+'images/no-image.jpg',
        orakuploader_add_label       : 'เลือกรูปภาพ',
        orakuploader_use_rotation: true,
        orakuploader_maximum_uploads : 1,
        orakuploader_hide_on_exceed : true,
    });

    function editphoto(path){
        $('#editphoto').parent().html('<div id="editphoto" orakuploader="on"></div>');
        if(path){
            $('#editphoto').orakuploader({
                orakuploader_path         : url+'/',
                orakuploader_ckeditor         : true,
                orakuploader_use_dragndrop            : true,
                orakuploader_use_sortable   : true,
                orakuploader_main_path : 'uploads/temp/',
                orakuploader_thumbnail_path : 'uploads/temp/',
                orakuploader_thumbnail_real_path : asset+'uploads/temp/',
                orakuploader_loader_image       : asset+'images/loader.gif',
                orakuploader_no_image       : asset+'images/noimage.jpg',
                orakuploader_add_label       : 'เลือกรูปภาพ',
                orakuploader_use_rotation: true,
                orakuploader_hide_on_exceed : true,
                orakuploader_maximum_uploads : 0,
                orakuploader_attach_images: [path],
            });
        }else{
            $('#editphoto').orakuploader({
                orakuploader_path         : url+'/',
                orakuploader_ckeditor         : true,
                orakuploader_use_dragndrop            : true,
                orakuploader_use_sortable   : true,
                orakuploader_main_path : 'uploads/temp/',
                orakuploader_thumbnail_path : 'uploads/temp/',
                orakuploader_thumbnail_real_path : asset+'uploads/temp/',
                orakuploader_loader_image       : asset+'images/loader.gif',
                orakuploader_no_image       : asset+'images/no-image.jpg',
                orakuploader_add_label       : 'เลือกรูปภาพ',
                orakuploader_use_rotation: true,
                orakuploader_hide_on_exceed : true,
                orakuploader_maximum_uploads : 1,
            });
        }
    }
</script> --}}
@endsection
