@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
@stop
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('permissions.store') }}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">REGISTRAR PERMISOS</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                    <label for="name" class="col-sm-2 col-form-label">Nombre del permiso:</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Escriba nombre de los permisos" value="{{ old('name')}}" autofocus>
                          @error('name')
                     <span class="error text-danger">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                        </div>
                    </div>
                   </div>
              </div>
            </div>
                <!-- /.card-body -->
       <div class="card-footer">
        <div class="row">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary">Guardar</button>
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
