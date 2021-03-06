<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.back')

@section('seo')
@endsection

@section('csstop')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('global/dropzone/dropzone.js')}}"></script>
    <link href="{{asset('global/dropzone/dropzone.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('global/orakuploader/orakuploader.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
    </style>
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
                                <table class="table table-striped table-bordered table-hover table-responsive" id="datatableAll">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">รูป</th>
                                            <th class="text-center">ชื่อ</th>
                                            <th class="text-center">ราคาขาย</th>
                                            <th class="text-center">สินค้า</th>
                                            <th class="text-center">วันที่เพิ่ม</th>
                                            <th class="text-center">สถานะ</th>
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

                    {{--  start clone  --}}
                    <div class="form-group row hidden" id="forclone" aria-hidden="true">
                        <label for="description" class="col-sm-2 col-form-label">สินค้าที่{{$title}}</label>
                        <div class="col-sm-6">
                            {{--  <input type="text" class="form-control" name="promotion_item[]" placeholder="สินค้า">  --}}
                            <select name="promotion_item[]" class="form-control">
                                <option value="null">เลือกสินค้า</option>
                                @foreach($products as $product)
                                <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control qty" name="qty[]" placeholder="จำนวน">
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-danger btn-sm pull-right" onclick="removeElement(this)">
                                -
                            </button>
                        </div>
                    </div>
                    {{--  end clone  --}}

                    <form id="formAdd" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-label">รูปภาพ{{$title}}</label>
                            <div class="col-sm-10">
                                <div id="promotion_picture" orakuploader="on"></div>
                            </div>
                            <div class="col-sm-10">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="promotion_name" class="col-sm-2 col-form-label">ชื่อ{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ชื่อ{{$title}}" class="form-control" name="promotion_name" placeholder="ชื่อ{{$title}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">สินค้าที่{{$title}}</label>
                            <div class="col-sm-6">
                                {{--  <input type="text" class="form-control" name="promotion_item[]" placeholder="สินค้า">  --}}
                                <select name="promotion_item[]" class="form-control" id="static">
                                    <option value="null">เลือกสินค้า</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control qty" name="qty[]" placeholder="จำนวน">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-clone">
                                    +
                                </button>
                            </div>
                        </div>
                        <div id="clone"></div>

                        <div class="form-group row">
                            <label for="sell_price" class="col-sm-2 col-form-label">ราคาขาย{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ราคาขาย{{$title}}" class="form-control" name="sell_price" placeholder="ราคาขาย{{$title}}">
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
                    <div class="modal-header">
                        <h5>แก้ไข{{$title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <form id="formEdit" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-label">รูปภาพ{{$title}}</label>
                            <div class="col-sm-10">
                                <div id="promotion_picture_edit" orakuploader="on"></div>
                            </div>
                            <div class="col-sm-10">

                            </div>
                        </div>
                        <input type="text" class="form-control hidden" name="promotion_id">
                        <div class="form-group row">
                            <label for="promotion_name" class="col-sm-2 col-form-label">ชื่อ{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ชื่อ{{$title}}" class="form-control" name="promotion_name" placeholder="ชื่อ{{$title}}">
                            </div>
                        </div>

                        <div class="form-group row indexfirst">
                            <label for="description" class="col-sm-2 col-form-label">สินค้าที่{{$title}}</label>
                            <div class="col-sm-6">
                                {{--  <input type="text" class="form-control" name="promotion_item[]" placeholder="สินค้า">  --}}
                                <select name="promotion_item[]" class="form-control" id="static">
                                    <option value="null">เลือกสินค้า</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control qty" name="qty[]" placeholder="จำนวน">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-primary btn-sm pull-right" id="btn-clone">
                                    +
                                </button>
                            </div>
                        </div>
                        <div id="clone"></div>

                        <div class="form-group row">
                            <label for="sell_price" class="col-sm-2 col-form-label">ราคาขาย{{$title}}</label>
                            <div class="col-sm-10">
                            <input type="ราคาขาย{{$title}}" class="form-control" name="sell_price" placeholder="ราคาขาย{{$title}}">
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
{{--  select2  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    
    {{-- Start  Add  --}}
    $( ".add-data" ).click(function() {
        document.getElementById('formAdd').reset();
        $("#static").select2();
        $( "#modalAdd" ).modal( "show" );
    });

    $( "#formAdd #btn-clone" ).click(function(e) {
        $( "#forclone" ).clone().removeClass('hidden').appendTo( "#formAdd #clone" );
        $("#formAdd #clone select[name='promotion_item[]']").select2();
        e.preventDefault();
        $("#formAdd input[name='qty[]']").each(function() {
            $(this).rules("add", 
            {
                required: true,
                messages: {
                    required: "กรุณาระบุ",
                },
            });
        });

    });

    $( "#formEdit #btn-clone" ).click(function(e) {
        $( "#forclone" ).clone().removeClass('hidden').appendTo( "#formEdit #clone" );
        $("#formEdit #clone select[name='promotion_item[]']").select2();
        e.preventDefault();
        $("#formEdit input[name='qty[]']").each(function() {
            $(this).rules("add", 
            {
                required: true,
                messages: {
                    required: "กรุณาระบุ",
                },
            });
        });

    });

    $( "#formAdd" ).validate({
        rules: {
            promotion_name: "required",
            sell_price: "required",
            'qty[]': "required",
        },
        messages: {
            promotion_name: "กรุณาระบุ",
            sell_price: "กรุณาระบุ",
            'qty[]': "กรุณาระบุ",
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
                url : url+"/admin/promotions",
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

    function removeElement(e){
        e.closest( ".form-group" ).remove();
    }


    {{--  End Add  --}}

    {{--  Start Edit  --}}
    $('body').on('click', '.edit-data', function(){
        var id = $(this).data('id');
        $('#formEdit #clone').html('');
        document.getElementById('formEdit').reset();
        $.ajax({
            method : "GET",
            url : url+"/admin/promotions/"+id,
            dataType : 'json'
        }).done(function(rec){
            $.each(jQuery.parseJSON(rec.promotion.promotion_item), function( index, value ) {
                    if(index!=0){
                        var stinghtml='';
                        stinghtml+=`
                        <div class="form-group row index`+index+`" id="forclone" aria-hidden="true">
                            <label for="description" class="col-sm-2 col-form-label">สินค้าที่{{$title}}</label>
                            <div class="col-sm-6">
                                <select name="promotion_item[]" class="form-control sss">
                                    <option value="null">เลือกสินค้า</option>`;
                                $.each(rec.products, function( i, p ) {
                                    if(p.product_id==value.product_id){
                                        stinghtml+=`<option value="`+p.product_id+`" selected>`+p.product_name+`</option>`;
                                    }else{
                                        stinghtml+=`<option value="`+p.product_id+`"  >`+p.product_name+`</option>`;
                                    }
                                }); 
                            stinghtml+=`
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control qty" name="qty[]" placeholder="จำนวน">
                            </div>
                            `;
                        stinghtml+=`
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-danger btn-sm pull-right" onclick="removeElement(this)">
                                -
                            </button>
                        </div>`;
                        stinghtml+=`</div>`;
                        $('#formEdit #clone').append(stinghtml);
                        $(".index"+index+" input[name='qty[]']").val(value.qty);
                }else{
                    $(".indexfirst select[name='promotion_item[]']").val(value.product_id);
                    $(".indexfirst input[name='qty[]']").val(value.qty);
                }
            });

            editphoto(rec.promotion.promotion_picture);
            $( "#formEdit input[name='promotion_id']" ).val( rec.promotion.promotion_id );
            $( "#formEdit input[name='promotion_name']" ).val( rec.promotion.promotion_name );
            $( "#formEdit input[name='sell_price']" ).val( rec.promotion.sell_price );
            $("#formEdit input[value="+rec.promotion.status+"]").prop('checked', true);
            $( "#modalEdit" ).modal( "show" );
        });
    });
    $( "#formEdit" ).validate({

        rules: {
            promotion_name: "required",
            promotion_price: "required",
        },
        messages: {
            promotion_name: "กรุณาระบุ",
            promotion_price: "กรุณาระบุ",
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
                url : url+"/admin/promotions/update",
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
                    url : url+"/admin/promotions/delete",
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
            url : url+"/admin/promotions/changeStatus",
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
            "url": url+"/admin/promotions/dataTable",
            // "data": function ( d ) {
            // }
        },
        "columns": [
            { "data": "DT_Row_Index" , "name": "DT_Row_Index" , "className": "text-center", "orderable": false , "searchable": false },
            { "data": "promotion_picture" , "name":"promotion.promotion_picture" , "className": "text-center",},
            { "data": "promotion_name" , "name":"promotion.promotion_name" },
            { "data": "sell_price" , "name":"promotion.sell_price" , "className": "text-ritght"},
            { "data": "promotion_item" , "name":"promotion.promotion_item" , "className": "text-ritght"},
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
<script>
    $('#promotion_picture').orakuploader({
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
        $('#promotion_picture_edit').parent().html('<div id="promotion_picture_edit" orakuploader="on"></div>');
        if(path){
            $('#promotion_picture_edit').orakuploader({
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
            $('#promotion_picture_edit').orakuploader({
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
</script>
<script>$("#static").select2();</script>
@endsection