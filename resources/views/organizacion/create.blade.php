@extends('adminlte::page')

@section('title', 'Organizaciones')

@section('content_header')
<br>
@stop

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header" style="background-color: rgb(73, 104, 165)">
              <h1 class="card-title">CREAR REGISTRO</h1>
            </div>
             <!--Form -->
            <form method='POST', action="{{ route('organizacion.store')}}" class="formulario" id="formulario1">
                @csrf
                <!--card-body -->
              <div class="card-body">
              <div class="row">
              <div class="col-sm-12">
             <div class="formulario__grupo" id="grupo__nombre">
              <label class="from-lab">NOMBRE:</label>
              <input type="text" class="form-inp text-uppercase @error('nombre') is-invalid @enderror"  name="nombre"  placeholder="Escriba nombre de la organizacion" value="{{ old('nombre')}}" required>
              @error('nombre')
              <span class="error text-danger" style=" font-size: 12px;">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
              <span class="error text-danger">
              <p class="formulario__input-error">*El formato SOLO puede contener letras y guion bajo*</p>
            </span>
            </div>
            </div>
              </div>
              <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-info" style="background-color: #004a81">REGISTRAR</button>
                            <a href="{{ route('cancelar', 'organizacion.index') }}" class="btn btn-outline-secondary">CANCELAR</a>
                        </div>
                    </div>
                </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card-body -->
           </form>
            <!--/Form -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


@stop

@section('css')

@stop

@section('js')

@stop







