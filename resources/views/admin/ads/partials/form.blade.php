<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la publicidad']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::select('type', array('horizontal' => 'Horizontal',
                                'vertical' => 'Vertical',
                                'nota-home' => 'Nota Home'),
                                 null, ['class' => 'form-control', 'readonly']) !!}
                    
    @error('type')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="bg-light p-4 rounded">
    <p class="font-bold">Medidas sugeridas:</p>
    <ul class="list-group">
        <li class="list-group-item">
            Horizontal: 700x80 
        </li>
        <li class="list-group-item">
            Vertical: 400x1000
        </li>
        <li class="list-group-item">
            Nota home: 700x640
        </li>
    </ul>
</div>

<div class="form-group py-2">
    {!! Form::label('link','Enlace:') !!}
    {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Ej: https://www.ejemplo.com']) !!}

    @error('link')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- imagen --}}

<div class="row">
    <div class="col">
        <div class="image-wrapper">

            @isset ($ad->image)
            
            <img id="picture" 
            src="{{ Storage::url($ad->image->url) }}">

            @else
            
            <img id="picture" 
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Aspect-ratio-16x9.svg/2560px-Aspect-ratio-16x9.svg.png" alt="">
            
            @endisset

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('image', 'Imagen de la publicidad') !!}
            {!! Form::file('image', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            
            @error('image')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>