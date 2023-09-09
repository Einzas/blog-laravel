    <div class="form-group">
        {!! Form::label('name', 'Nombre',) !!}
        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=> 'Ingrese nombre de pelicula']) !!}


        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror

    </div>

    <div class="form-group">
        {!! Form::label('slug', 'slug',) !!}
        {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=> 'Ingrese slug','readonly']) !!}

        @error('slug')
        <small class="text-danger">{{$message}}</small>
        @enderror

    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}

        @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror

    </div>    
        
    <div class="form-group "> 
        <p class="font-weight-bold">Genero</p>
        @foreach ($tags as $tag)
            <label class="mr-2">
                {!! Form::checkbox('tags[]', $tag->id,null) !!}
                {{$tag->name}}
            </label>
        @endforeach
        
        <hr>

        @error('tags')
        <small class="text-danger">{{$message}}</small>
    @enderror
    </div>

    <div class="form-group">
        <p class="font-weight-bold">Estado</p>

        <label>
            {!! Form::radio('status', 1, true) !!}
            Borrador
        </label>

        <label >
            {!! Form::radio('status', 2) !!}
            Publicado
        </label>

        <hr>

        @error('status')
        <small class="text-danger">{{$message}}</small>
    @enderror

    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="image-wrapper">
                @if ($post->image)
                    <img src="{{Storage::url($post->image->url)}}" id="picture">
                @else
                    <img src="https://wallpaperaccess.com/full/3595398.jpg" id="picture">
                    
                @endif
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('file', 'imagen muestra',) !!}
                {!! Form::file('file', ['class'=>'form-control-file']) !!}
            </div>
        </div>
    </div>

    <div class="text-dark form-group">
        {!! Form::label('extract','Extracto',['class'=>'text-white']) !!}
        {!! Form::textarea('extract', null,['class'=>'text-white']) !!}


        @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror

    </div>  

    <div class="text-dark form-group">
        {!! Form::label('body','Sinopsis',['class'=>'text-white']) !!}
        {!! Form::textarea('body', null,['class'=>'form-control']) !!}


        @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
