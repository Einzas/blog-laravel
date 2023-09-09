@extends('adminlte::page')
@section('title', 'Panel')

@section('content_header')
    <h1>Crear de Pelicula</h1>
@stop

@section('content')
     {!! Form::open(['route'=> 'admin.posts.store','autocomplete'=>'off','files'=>true]) !!}
           
            {!! Form::hidden('user_id',Auth()->user()->id) !!}
        
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
                        <img id="picture" src="https://wallpaperaccess.com/full/3595398.jpg" alt="">
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
            
            </div> 

            {!! Form::submit('Crear Reseña', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>

    
@stop

@section('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
        
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection