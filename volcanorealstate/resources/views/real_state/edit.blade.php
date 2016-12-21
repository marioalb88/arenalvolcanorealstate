@extends('layout.master')

@section('title')
Bienes raíces
@stop

@section('menu')
    <li><a href="/">Inicio</a></li>
    <li><a href="#">Buscar</a></li>
    <li><a href="/contact">Contáctenos</a></li>
@stop

@section('content')

{{ Form::open(['method' => 'put', 'route' => [ 'real_state.update', $id]])}}
{{ csrf_field() }}

<div class="form-group">
  <label for="name" class="col-md-4 control-label">Nombre</label>
  <div class="col-md-6">
  {{ Form::input('text','name',$name,['class' => 'form-control']) }}
  </div>
</div>
<div class="form-group">
    <label for="description" class="col-md-4 control-label">Descripción</label>

    <div class="col-md-6">
        <input id="description" type="text" class="form-control" name="description" value="{{$description}}" required autofocus>
    </div>
</div>

<input type="submit" class="btn btn-success">

{{ Form::close() }}

@stop