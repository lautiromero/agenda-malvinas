@extends('adminlte::page')

@section('title', 'Tags - Agenda Malvinas')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')
   
    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag],'method' => 'put' ]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta']) !!}
        
                @error('name')
                    <span class="text-danger">{{ $message }}</span>   
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug de la etiqueta', 'readonly']) !!}
        
                @error('slug')
                <span class="text-danger">{{ $message }}</span>   
                @enderror
            </div>

            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop