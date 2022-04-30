@extends('adminlte::page')

@section('title', 'Tags - Agenda Malvinas')

@section('content_header')
    <h1>Lista de tags</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary">Agregar etiqueta</a>
        </div>

        <dic class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </dic>
    </div>
@stop

@section('js')
    <script>
        document.onsubmit=function(){
           return confirm('Está seguro que desea eliminar esta etiqueta? La informacion no podrá recuperarse.');
        }
    </script>
@stop