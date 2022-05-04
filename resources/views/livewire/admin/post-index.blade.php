<div>
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif

    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Buscar noticia">
        </div>

        @if ($posts->count())
        
        <dic class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td>
                                @if ($post->status == 1)
                                    Borrador
                                @else
                                    Publicada
                                @endif
                            </td>
                            <td width="10px">
                                <a href="{{ route('posts.show', $post) }}" target="_blank" class="btn btn-primary btn-sm">Ver</a>
                            </td>
                            <td width="10px">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
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

        <div class="card-footer">
            {{ $posts->links() }}
        </div>

        @else

        <div class="card-body">
            <strong>No hay registros que coincidan con: {{$search}}</strong>
        </div>

        @endif
        

    </div>

    @section('js')
    <script>
        document.onsubmit=function(){
           return confirm('Está seguro que desea eliminar esta noticia? La informacion no podrá recuperarse.');
        }
    </script>
    @stop

</div>
