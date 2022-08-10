@extends('adminlte::page')

@section('title', 'Vehiculos')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<hr>
<h5>¿Realmente desea eliminar datos de vevhiculo?</h5>
<form method='POST', action="{{ route('vehiculo.destroy', $vehiculo->id)}}">
@method('DELETE')
@csrf







        <button type="submit" class="btn btn-info"><i class="fas fa-trash-alt"></i> Eliminar</button>
        <a href="{{ route('cancelar_vehiculo') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>


    </form>

    @stop

    @section('css')
    @stop

    @section('js')

    @stop
