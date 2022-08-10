@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>BIENVENIDO</h1>
@stop

@section('content')
          <!-- =========================================================== -->

        <!-- Small Box (Stat card) -->
        <div class="row">
       <!-- ./col -->
       <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box " style="background-color: rgb(119, 126, 249)">
          <div class="inner">
            <h3>{{ $users }}</h3>

            <p>Registros de Usuarios</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="{{ route('users.index') }}" class="small-box-footer">
          Más información<i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box x" style="background-color: rgb(236, 246, 148)">
                  <div class="inner">
                    <h3>{{  $organizacione }}</h3>

                    <p>Registros de Organizaciones</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-building"></i>
                  </div>
                  <a href="{{ route('organizacion.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
                     <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $vehic }}</h3>

                <p>Registro de Tarjetas</p>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>

              </div>
              <a href="{{ route('vehiculo.index') }}" class="small-box-footer">
                Más información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->



        </div>
        <!-- /.row -->


        <!-- =========================================================== -->
@stop

@section('css')

@stop

@section('js')

@stop
