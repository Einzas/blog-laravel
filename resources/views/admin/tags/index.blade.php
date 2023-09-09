@extends('adminlte::page')
@section('title', 'Panel')

@section('content_header')
    <div class="div card-header">
        <h1>Lista de Generos 
            <a style="margin-left: 30px" class="btn btn-secondary btn-sm" href="{{route('admin.tags.create')}}">Crear Genero</a>
        </h1>
    </div>
@stop

@section('content')
    @if(session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>     
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="8px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit',$tag)}}">Editar</a>
                            </td>
                            <td width="8px">
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="Submit">Eliminar</button>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @stop


