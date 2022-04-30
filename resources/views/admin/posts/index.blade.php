@extends('adminlte::page')

@section('title', 'Administrador - Agenda Malvinas')

@section('content_header')

    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary btn-sm float-right">Crear Noticia</a>

    <h1>Lista de noticias</h1>
@stop

@section('content')
    @livewire('admin.post-index')
@stop
