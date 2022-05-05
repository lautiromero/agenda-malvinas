<div>
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Buscar por el contenido del comentario">
        </div>

        @if ($comments->count())
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Noticia</th>
                            <th>Comentario</th>
                            <th colspan="1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->post->name }}</td>
                                <td>{{ $comment->body }}</td>
                                <td width="10px">
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>      
            </div>   
            <div class="card-footer">
                {{ $comments->links() }}    
            </div> 

        @else

            <div class="card-body">
                <strong>No hay registros</strong>
            </div>

        @endif

    </div> 
</div>
