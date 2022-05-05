@extends('adminlte::page')

@section('title', 'Administrador - Agenda Malvinas')

@section('content_header')
    <h1>Editar publicidad</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::model($ad, ['route' => ['admin.ads.update', $ad], 'autocomplete' => 'off', 'files' => 'true', 'method' => 'put']) !!}

                @include('admin.ads.partials.form')

                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-small mt-3']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <style>
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
    <script>

        $(document).ready( function() {
        //imagen replace

            $('#image').change(function(e){

                if(this.files[0].size > 2097152){
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

 
        $('select[readonly="readonly"] option:not(:selected)').attr('disabled',true);

        });
    </script>

@stop
