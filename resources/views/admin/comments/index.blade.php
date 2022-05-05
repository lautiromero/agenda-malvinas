@extends('adminlte::page')

@section('title', 'Administrador - Agenda Malvinas')

@section('content_header')
    <h1>Lista de Comentarios</h1>
@stop

@section('content')
    @livewire('admin.comment-index')
@stop

@section('js')
    <script>
        document.onsubmit=function(){
           return confirm('Está seguro que desea eliminar este comentario? La informacion no podrá recuperarse.');
        }
    </script>
@stop