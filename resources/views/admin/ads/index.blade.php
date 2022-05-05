@extends('adminlte::page')

@section('title', 'Administrador - Agenda Malvinas')

@section('content_header')
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
                        <th colspan="1"></th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </dic>
    </div>
@stop
