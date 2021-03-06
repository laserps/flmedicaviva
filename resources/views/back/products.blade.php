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
                                            <th class="text-center">ประเภท{{$title}}</th>
                                            <th class="text-center">ชื่อ{{$title}}</th>
                                            <th class="text-center">ราคา{{$title}}</th>
                                            <th class="text-center">ราคาขาย{{$title}}</th>
                                            <th class="text-center">หน่วยนับ{{$title}}</th>
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


                    <div class="modal-header">
                        <h5>เพิ่ม{{$title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAdd" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-label">รูปภาพ{{$title}}</label>
                            <div class="col-sm-10">
                                <div id="photo" orakuploader="on"></div>
                            </div>
                            <div class="col-sm-10">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-2 col-form-label">ชื่อ{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ชื่อ{{$title}}" class="form-control" name="product_name" placeholder="ชื่อ{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-sm-2 col-form-label">ราคา{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ราคา{{$title}}" class="form-control" name="product_price" placeholder="ราคา{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sell_price" class="col-sm-2 col-form-label">ราคาขาย{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ราคาขาย{{$title}}" class="form-control" name="sell_price" placeholder="ราคาขาย{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_id" class="col-sm-2 col-form-label">หน่วยนับ{{$title}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" name="unit_id">
                                        <option value="">เลือกหน่วยนับ{{$title}}</option>
                                        @foreach($Units as $unit)
                                        <option value="{{ $unit->unit_id }}">{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">ประเภท{{$title}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" name="category_id">
                                        <option value="">เลือกประเภท{{$title}}</option>
                                        @foreach($Categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="col-sm-2 col-form-label">รายละเอียดแบบย่อ{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="short_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">รายละเอียด{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="properties" class="col-sm-2 col-form-label">คุณสมบัติ{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="properties" rows="3"></textarea>
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
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="modal-header">
                        <h5>เพิ่ม{{$title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-2 col-form-label">รูปภาพ{{$title}}</label>
                            <div class="col-sm-10">
                                <div id="editphoto" orakuploader="on"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-2 col-form-label">ชื่อ{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ชื่อ{{$title}}" class="form-control" name="product_name" id="product_name" placeholder="ชื่อ{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-sm-2 col-form-label">ราคา{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ราคา{{$title}}" class="form-control" name="product_price" id="product_price" placeholder="ราคา{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sell_price" class="col-sm-2 col-form-label">ราคาขาย{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ราคาขาย{{$title}}" class="form-control" name="sell_price" id="sell_price" placeholder="ราคาขาย{{$title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_id" class="col-sm-2 col-form-label">หน่วยนับ{{$title}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" name="unit_id" id="unit_id">
                                        <option value="">เลือกหน่วยนับ{{$title}}</option>
                                        @foreach($Units as $unit)
                                        <option value="{{ $unit->unit_id }}">{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label">ประเภท{{$title}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">เลือกประเภท{{$title}}</option>
                                        @foreach($Categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="col-sm-2 col-form-label">รายละเอียดแบบย่อ{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="short_description" id="short_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">รายละเอียด{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="properties" class="col-sm-2 col-form-label">คุณสมบัติ{{$title}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="properties" id="properties" rows="3"></textarea>
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
            product_name: "required",
            product_price: "required",
        },
        messages: {
            product_name: "กรุณาระบุ",
            product_price: "กรุณาระบุ",
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
                url : url+"/admin/products",
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
            url : url+"/admin/products/"+id,
            dataType : 'json'
        }).done(function(rec){
            // console.log(rec.product_image);
            editphoto(rec.product_image);
            $( "#product_id" ).val( id );
            $( "#product_name" ).val( rec.product_name );
            $( "#product_price" ).val( rec.product_price );
            $( "#sell_price" ).val( rec.sell_price );
            $( "#description" ).val( rec.description );
            $( "#category_id" ).val( rec.category_id );
            $( "#unit_id" ).val( rec.unit_id );
            $( "#short_description" ).val( rec.short_description );
            $( "#properties" ).val( rec.properties );
            //$( "#product_image" ).val(  );
            $("#modalEdit input[value="+rec.status+"]").prop('checked', true);
            $( "#modalEdit" ).modal( "show" );
        });
    });
    $( "#formEdit" ).validate({
        rules: {
            product_name: "required",
            product_price: "required",
        },
        messages: {
            product_name: "กรุณาระบุ",
            product_price: "กรุณาระบุ",
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
                url : url+"/admin/products/update",
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
                    url : url+"/admin/products/delete",
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
            url : url+"/admin/products/changeStatus",
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
        //"focusInvalid": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": url+"/admin/products/dataTable",
            // "data": function ( d ) {
            // }
        },
        "columns": [
            { "data": "DT_Row_Index" , "name": "DT_Row_Index" , "className": "text-center", "orderable": false , "searchable": false },
            { "data": "category_name" , "name":"category.category_name" , "className": "text-center",},
            { "data": "product_name" , "name":"product_name" },
            { "data": "product_price" , "name":"product_price" , "className": "text-ritght"},
            { "data": "sell_price" , "name":"sell_price" , "className": "text-ritght"},
            { "data": "unit_name" , "name":"unit.unit_name" , "className": "text-center"},
            { "data": "created_at" , "name":"created_at"},
            { "data": "status" , "name":"status" , "className": "text-center", "searchable": false},
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
