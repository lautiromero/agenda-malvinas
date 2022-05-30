@extends('adminlte::page')

@section('title', 'Administrador - Agenda Malvinas')

@section('content_header')
    <h1>Crear noticia</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => 'true']) !!}

                @include('admin.posts.partials.form')

                {!! Form::submit('Crear', ['class' => 'btn btn-primary btn-small']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300;400;500;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap);
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
@stop


@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/2mj51zl6ywb1qade10lzyzemnl5g779q7pxnb8er07zpi7tg/tinymce/6/tinymce.min.js"
     referrerpolicy="origin"></script>

    {{-- Jquery string to slug --}}
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });

            //imagen replace

            $('#image').change(function(e){

                if(this.files[0].size > 3597152){
                    alert("La imagen es demasiado pesada.");
                    this.value = "";
                };

                let file= e.target.files[0];

                let reader= new FileReader();

                reader.onload= (event) => {

                $('#picture').attr('src', event.target.result)

                };

                reader.readAsDataURL(file);

            });

        });
    
    // tinimce editor

        tinymce.init({selector:'#body',
            plugins: 'image imagetools autolink lists media table',
            toolbar: 'code export formatpainter undo redo | styleselect | fontselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent image editimage pageembed permanentpen table tableofcontents language',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            language: 'es',
            content_langs: [
                { title: 'Spanish', code: 'es' }
            ],
            image_class_list: [
                {title: 'Imagen Adaptable', value: 'img-fluid'},
                ],
            height: 500,
            content_style: "@import url(https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300;400;500;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap); body { font-family: 'Roboto', sans-serif; } h1,h2,h3,h4,h5,h6 { font-family: 'Alegreya Sans', sans-serif; }",
            font_formats: "Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/admin/upload',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                    };
                    input.click();
            }
        });

    </script>

@stop
