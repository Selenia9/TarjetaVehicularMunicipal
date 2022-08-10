@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
@stop
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('permissions.update', $permission->id) }}" method="post" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">EDITAR REGISTRO</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">NOMBRE DEL PERMISO:</label>
                <div class="col-sm-7">
                  <input type="text" style="text-transform:uppercase;"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $permission->name) }}" autofocus>
                  @error('name')
                  <span class="error text-danger">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
                      <!-- /.card-body -->
       <div class="card-footer">
        <div class="row">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('cancelar_permissions') }}" class="btn btn-default float-right">CANCELAR</a>

            </div>
          </div>
      </div>
      <!-- /.card-footer -->
          </div>
        </form>
      </div>
    </div>
  </div>
@stop

@section('css')
   
@stop

@section('js')

@stop
