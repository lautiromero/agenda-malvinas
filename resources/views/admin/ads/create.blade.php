@extends('adminlte::page')

@section('title', 'Administrador - Agenda Malvinas')

@section('content_header')
    <h1>Crear publicidad</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.ads.store', 'autocomplete' => 'off', 'files' => 'true']) !!}

                @include('admin.ads.partials.form')

                {!! Form::submit('Crear', ['class' => 'btn btn-primary btn-small mt-3']) !!}

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

                let file= e.target.files[0];

                let reader= new FileReader();

                reader.onload= (event) => {

                $('#picture').attr('src', event.target.result)

                };

                reader.readAsDataURL(file);

            });

        });
    </script>

@stop
