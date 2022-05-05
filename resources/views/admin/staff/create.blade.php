@extends('adminlte::page')

@section('title', 'Administrador - Agenda Malvinas')

@section('content_header')
    <h1>Agregar staff</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.staff.store', 'autocomplete' => 'off']) !!}

                <div class="form-group">
                    {!! Form::label('name','Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre completo']) !!}
                
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('rol', 'Tipo:') !!}
                    {!! Form::select('rol', array('director' => 'Director',
                                                'editor' => 'Editor',
                                                'relaciones' => 'Relaciones inst.',
                                                'redes' => 'Redes Sociales',
                                                'desarrollo' => 'Diseño y des.'),
                                                 null, ['class' => 'form-control']) !!}
                                    
                    @error('rol')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {!! Form::submit('Crear', ['class' => 'btn btn-primary btn-small mt-3']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop