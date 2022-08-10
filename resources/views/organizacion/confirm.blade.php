

@extends('adminlte::page')

@section('title', 'Organizacion')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


<hr>
<h5>¿Realmente desea eliminar la categoria?</h5>
<form method='POST', action="{{ route('organizacion.destroy', $organizacion->id)}}">
@method('DELETE')
@csrf
    <div class="form-group">
       <p>Nombre:</p>
       <input type="text" class="form-control" name="nombre" value="{{ $organizacion->nombre }}" disabled="true">
    </div>
    <button type="submit" class="btn btn-info"><i class="fas fa-trash-alt"></i> Eliminar</button>
     <a href="{{ route('cancelar_organizacion') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
</form>
@stop

@section('css')
@stop

@section('js')

@stop
