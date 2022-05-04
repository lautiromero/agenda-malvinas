
                <div class="form-group">
                    {!! Form::label('name','Título:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título de la noticia']) !!}
                
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug','Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
                                
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- imagen --}}

                <div class="row">
                    <div class="col">
                        <div class="image-wrapper">

                            @isset ($post->image)
                            
                            <img id="picture" 
                            src="{{ Storage::url($post->image->url) }}">

                            @else
                            
                            <img id="picture" 
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Aspect-ratio-16x9.svg/2560px-Aspect-ratio-16x9.svg.png" alt="">
                            
                            @endisset

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('image', 'Imagen principal') !!}
                            {!! Form::file('image', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                            
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group pt-3">
                    {!! Form::label('img_desc','Descripcion de imagen:') !!}
                    {!! Form::text('img_desc', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion de la imagen']) !!}
                
                    @error('img_desc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Categoría:') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                                    
                    @error('categoty_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Tags</p>
                    @foreach ($tags as $tag)


                    <label class="btn btn-sm btn-outline-primary mr-2 text-uppercase">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{$tag->name}}
                    </label>

                    @endforeach
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>

                    <label class="mr-1">
                        {!! Form::radio('status', 1, true) !!}
                        Borrador
                    </label>

                    <label>
                        {!! Form::radio('status', 2, false) !!}
                        Publicado
                    </label>
                </div>

                <div class="form-group">
                    {!! Form::label('extract', 'Descripción de la noticia') !!}
                    {!! Form::textarea('extract', null, ['class' => 'form-control', 'rows' => '3']) !!}
                                    
                    @error('extract')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Cuerpo de la noticia') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                                    
                    @error('body')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
