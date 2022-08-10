@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@stop
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('users.store') }}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">REGISTRAR USUARIO</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}" autofocus>
                  @error('name')
                    <span class="error text-danger">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <div class="row">
                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                  @error('email')
                  <span class="error text-danger">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña">
                  @error('password')
                    <span class="error text-danger">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <div class="row">
                <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <table class="table">
                                    <tbody>
                                        @foreach ($roles as $id => $role)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $id }}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $role }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!--Footer-->
            <div class="card-footer">
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('cancelar_users') }}" class="btn btn-default float-right">CANCELAR</a>

                    </div>
                  </div>
              </div>
            <!--End footer-->
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
