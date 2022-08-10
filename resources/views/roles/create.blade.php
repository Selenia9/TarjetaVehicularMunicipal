@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
@stop
@section('content')


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
          @csrf
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">REGISTRAR ROL</h4>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del rol:</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('modelo')}}" autocomplete="off" autofocus>
                    @error('name')
                    <span class="error text-danger">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <div class="tab-content">
                      <div class="tab-pane active">
                        <table class="table">
                          <tbody>
                            @foreach ($permissions as $id => $permission)
                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                      value="{{ $id }}">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td>
                                {{ $permission }}
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

            <!--End body-->
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="row">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('cancelar_roles') }}" class="btn btn-default float-right">CANCELAR</a>

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
