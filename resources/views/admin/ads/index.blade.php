@extends('adminlte::page')

@section('title', 'Administrador - Agenda Malvinas')

@section('content_header')
    @can('admin.ads.create')
        <a href="{{ route('admin.ads.create') }}" class="btn btn-secondary btn-sm float-right">Agregar publicidad</a>
    @endcan
        <h1>Lista de publicidades</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            
        </div>

        <dic class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ads as $ad)
                        <tr>
                            <td>{{ $ad->id }}</td>
                            <td>{{ $ad->name }}</td>
                            <td>{{ $ad->type }}</td>
                            <td width="10px">
                                @can('admin.ads.edit')
                                <a href="{{ route('admin.ads.edit', $ad) }}" class="btn btn-primary btn-sm">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.ads.destroy')
                                <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete">Eliminar</button>
                                </form>
                                @endcan
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
           return confirm('Está seguro que desea eliminar esta publicidad? La informacion no podrá recuperarse.');
        }
    </script>
@stop
