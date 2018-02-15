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
        <p class="title-description"> ระบบจัดการข้อมูลข่าวสาร{{$title}} </p>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <section class="example">
                            <textarea name="tm" class="form-control"></textarea>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

@endsection

@section('jsbottom')
<script type="text/javascript">
    {{-- Start  Add  --}}
    $( "#formAdd" ).validate({
        rules: {
            agent_name: "required",
            agent_price: "required",
        },
        messages: {
            agent_name: "กรุณาระบุ",
            agent_price: "กรุณาระบุ",
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
                url : url+"/admin/agents",
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

    $( "#formEdit" ).validate({
        rules: {
            agent_name: "required",
            agent_price: "required",
        },
        messages: {
            agent_name: "กรุณาระบุ",
            agent_price: "กรุณาระบุ",
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
                url : url+"/admin/agents/update",
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
</script>

{{--  <!-- TinyMCE init -->  --}}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "{{asset('admin')}}",
    selector: "textarea[name='tm']",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + '/laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
        });
    }
  };

  tinymce.init(editor_config);
</script>

@endsection

