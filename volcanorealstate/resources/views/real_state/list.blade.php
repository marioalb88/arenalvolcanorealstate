@extends('layout.master')

@section('title')
Dashboard
@stop

@section('menu')
    <li class="active"><a href="/">Inicio</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="/contact">Contactanos</a></li>
@stop

@section('content')

<h1>Bienes de Costa Rica</h1>

          <div class="container col-xs-12">
                <a href="{{ action("RealStateController@create")}}" class="btn btn-success" role="button">Agregar</a>
            </div>
<br>
@foreach($real_states as $result)
    <div class="container col-md-6">
        <div class="row">
            <div class="col-md-8">
                <img src="/img/sinImagen.jpg" width="244" height="163">
            </div>
            <div class="container col-md-4">
                <p>Nombre: {{$result->name}}</p>
                <p>Descripción:{{$result->description}}</p>
            </div>
            <div class="container col-md-4">
                <a href="{{ action("RealStateController@edit",['id' => $result->id]) }}" class="btn btn-primary" role="button">Editar</a>
            </div>
            <div class="container col-md-4">
                {{ Form::open(['method' => 'delete', 'route' => ['real_state.destroy', $result->id]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </div>
        </div>        
</div>
<br>
@endforeach
@stop