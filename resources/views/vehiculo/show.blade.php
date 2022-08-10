
@extends('adminlte::page')

@section('title', 'Vehiculos')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">

              <p class="card-category">Vista detallada del propietario:  <a style=" font-weight:bold; font-size: 150%"> {{$vehiculo->propietario->nombre}}</a></p>
            </div>
            <div class="col-md-12">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                      <div class="author">




                        <div class="row mb-3">
                        <label for="inputEmail3" id="labelN" class="col-sm-2 col-form-label" style=" font-weight:bold;">ORGANIZACIÓN:</label>
                        <div class="col-sm-10">


                     <p>   {{$vehiculo->organizacion->nombre}}</p>

                        </div>
                        </div>


                        <!--<div class="row mb-3">
                            <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm">DOMICILIO:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="motor" style="   border-bottom:1px solid rgb(7, 7, 7);">
                            </div>
                            <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm">NUMERO DE ASIENTOS</label>
                            <div class="col-sm-2">
                            <input type="number" class="form-control form-control-sm" id="colFormLabelSm" name="asiento">
                            </div>

                            </div>*/-->


                        <div class="row mb-3">
                        <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm" style=" font-weight:bold;">PLACA N°:</label>
                        <div class="col-sm-2">
            <p> {{ $vehiculo->placa }}</p>
                        </div>
                        <label for="colFormLabelSm" id="labelN" class="col-sm-1 col-form-label col-form-label-sm" style=" font-weight:bold;">MARCA:</label>
                        <div class="col-sm-3">
        <p>{{ $vehiculo->marca }}</p>
                        </div>
                        <label for="colFormLabelSm" id="labelN" class="col-sm-1 col-form-label col-form-label-sm" style=" font-weight:bold;">MODELO:</label>
                        <div class="col-sm-3">
                       <p>{{ $vehiculo->modelo }}</p>
                        </div>
                        </div>






                        <div class="row mb-3">
                        <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm" style=" font-weight:bold;">COLOR:</label>
                        <div class="col-sm-2">
                     <p>{{ $vehiculo->color }}</p>
                        </div>
                        <label for="colFormLabelSm" id="labelN" class="col-sm-1 col-form-label col-form-label-sm" style=" font-weight:bold;">TIPO:</label>
                        <div class="col-sm-3">
                  <p>{{ $vehiculo->tipoVehiculo }}</p>
                        </div>
                        <label for="colFormLabelSm" id="labelN" class="col-sm-1 col-form-label col-form-label-sm" style=" font-weight:bold;">COMBUSTIBLE</label>
                        <div class="col-sm-3">
              <p>{{ $vehiculo->combustible }}</p>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm" style=" font-weight:bold;">CHASIS N°:</label>
                        <div class="col-sm-4">
                      <p>{{ $vehiculo->chasis }}</p>
                        </div>
                        <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm" style=" font-weight:bold;">CAPACIDAD:</label>
                        <div class="col-sm-4">
                     <p>{{ $vehiculo->capacidad }}</p>
                        </div>

                        </div>
                        <div class="row mb-3">
                        <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm" style=" font-weight:bold;">MOTOR N°:</label>
                        <div class="col-sm-4">
                     <p>{{ $vehiculo->motor }}</p>
                        </div>
                        <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm" style=" font-weight:bold;">NUMERO DE ASIENTOS</label>
                        <div class="col-sm-4">
                       <p>{{ $vehiculo->asiento }}</p>
                        </div>

                        </div>


                        <div class="row mb-3">
                        <label for="inputEmail3" id="labelN" class="col-sm-2 col-form-label" style=" font-weight:bold;">RUTA AUTORIZADA:</label>
                        <div class="col-sm-10">
              <p>{{ $vehiculo->rutaAutorizada }}</p>
                        </div>
                        </div>
                        </div>

                        </div>
                        <div class="row mb-3">
                        <label for="colFormLabelSm" id="labelN" class="col-sm-2 col-form-label col-form-label-sm" style=" font-weight:bold;">LICENCIA VALIDAD DESDE</label>
                        <div class="col-sm-2">
                    <p>{{ $f }}</p>
                        </div>
                        <label for="colFormLabelSm" id="labelN" class="col-sm-1 col-form-label col-form-label-sm"style=" font-weight:bold;">AL</label>
                        <div class="col-sm-2">
                       <p>{{ $ff }}</p>

                        </div>

                      </div>
                    </p>

                  </div>

                </div>
              </div><!--end card user 2-->
              <div class="card-footer">
                <div class="button-container">
                  <a href="{{ route('vehiculo.edit',$vehiculo->id)}}" class="btn btn-sm btn-twitter"> Editar </a>

                  <a href="{{ route('vehiculo.index') }}" class="btn btn-danger"></i> Volver</a>


                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @stop

  @section('css')
  @stop

  @section('js')
  @stop








