@extends('adminlte::page')
@section('title', 'Panel')

@section('content_header')
    <div class="div card-header">
        <h1>Lista de Post-Pelicula</h1>
    </div>
@stop

@section('content')

@if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>     
    @endif
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop