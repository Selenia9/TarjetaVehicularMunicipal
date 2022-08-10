@extends('adminlte::page')

@section('title', 'Vehiculos')

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
            @if(session('datos'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('datos') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form method='POST', action="{{ route('vehiculo.store')}}" class="formulario" id="formulario">
                @csrf
                <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
              <h6 style="color: #004a81;font-weight: bold;    font-family:castellar;">1.-DATOS DE LA ORGANIZACIÓN</h6>
             </div>
          </div>
          <br>
              <div class="row">
                <div class="col-sm-6">
                    <div class="formulario__grupo" id="grupo__anio">
                        <label class="from-lab">ORGANIZACIÓN</label>
                         <select id="disabledSelect" class="form-inp @error('organizacion') is-invalid @enderror" name="organizacion" >
                       <option value="{{old('organizacion')}}">selccione una Organización</option>
                        @foreach($organizaciones as $organizacion)
                        <option value="{{ $organizacion->id }}">{{$organizacion->nombre}}</option>
                        @endforeach
                        </select>
                        @error('organizacion')
                        <span class="error text-danger" style=" font-size: 12px;">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                  <h6 style="color: #004a81;font-weight: bold;    font-family:castellar;">2.-DATOS DEL PROPIETARIO</h6>
                 </div>
              </div>
              <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="formulario__grupo" id="grupo__ci">
                            <label class="from-lab"> CÉLULA DE IDENTIDAD </label>
                            <input type="text" class="form-inp text-uppercase @error('ci') is-invalid @enderror"  name="ci" value="{{ old('ci')}}" placeholder="Ejemplo (12345678-AB)">
                            @error('ci')
                            <span class="error text-danger" style=" font-size: 12px;">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <span class="error text-danger">
                            <p class="formulario__input-error">*El formato SOLO puede contener letras,numero y guiones*</p>
                          </span>
                        </div>
                         </div>
                      </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="formulario__grupo" id="grupo__nombre">
                                    <label class="from-lab">NOMBRENOMBRE COMPLETO</label>
                            <input type="text" class="form-inp text-uppercase @error('nombre') is-invalid @enderror"  name="nombre" value="{{ old('nombre')}}" placeholder="Ingrese el nombre y apellido">
                            @error('nombre')
              <span class="error text-danger" style=" font-size: 12px;">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
              <span class="error text-danger">
              <p class="formulario__input-error">*El formato SOLO puede contener letras*</p>
            </span>
                        </div>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-9">
                            <div class="formulario__grupo" id="grupo__domicilio">
                                <label class="from-lab">DOMICILIO</label>
                            <input type="text" class="form-inp text-uppercase @error('domicilio') is-invalid @enderror" name="domicilio" value="{{ old('domicilio')}}" placeholder="ingrese la Dirección de su domicilio">
                            @error('domicilio')
                            <span class="error text-danger" style=" font-size: 12px;">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            <span class="error text-danger">
                            <p class="formulario__input-error">*El formato SOLO puede contener letras y guiones y caracteres*</p>
                          </span>
                        </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="formulario__grupo" id="grupo__telefono">
                                <label class="from-lab">TELEFÓNO</label>
                               <input type="text" class="form-inp text-uppercase @error('telefono') is-invalid @enderror"  name="telefono" value="{{ old('telefono')}}" placeholder="Ingre su número de telefóno">
                               @error('telefono')
                               <span class="error text-danger" style=" font-size: 12px;">
                               <strong>{{ $message }}</strong>
                               </span>
                               @enderror
                               <i class="formulario__validacion-estado fas fa-times-circle"></i>
                               <span class="error text-danger">
                               <p class="formulario__input-error">*El formato de  telefono solo puede contener letras, numeros y guiones*</p>
                             </span>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                      <h6 style="color: #004a81;font-weight: bold;    font-family:castellar;">3.-DATOS DEL VEHICULO</h6>
                     </div>
                  </div>
                  <br>
              <div class="row">
                <div class="col-sm-4">
                    <div class="formulario__grupo" id="grupo__placa">
                        <label class="from-lab">PLACA N°</label>
                        <input type="text" class="form-inp text-uppercase @error('nombre') is-invalid @enderror"  name="placa" value="{{ old('placa')}}" placeholder="Ingrese el número de Placa ">
                        @error('placa')
                  <span class="error text-danger" style=" font-size: 12px;">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  <span class="error text-danger">
                  <p class="formulario__input-error">*El formato debe de contener letras, numeros y giones*</p>
                </span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="formulario__grupo" id="grupo__marca">
                        <label class="from-lab">MARCA</label>
                    <input type="text" class="form-inp text-uppercase @error('marca') is-invalid @enderror"  name="marca" value="{{old('marca')}}" placeholder="Ejemplo (FOTON)">
                    @error('marca')
                    <span class="error text-danger" style=" font-size: 12px;">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    <span class="error text-danger">
                    <p class="formulario__input-error">*El formato debe de contener letras, numeros y giones*</p>
                  </span>
                </div>
                </div>

                <div class="col-sm-4">
                    <div class="formulario__grupo" id="grupo__modelo">
                        <label class="from-lab">MODELO</label>
                        <input type="text" class="form-inp text-uppercase @error('modelo') is-invalid @enderror"  name="modelo" value="{{old('modelo')}}" placeholder="Ejemplo (2022)">
                        @error('modelo')
                        <span class="error text-danger" style=" font-size: 12px;">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        <span class="error text-danger">
                        <p class="formulario__input-error">*El formato modelo debe de ser año y el maximo es de 4 digitos*</p>
                      </span>
                </div>
            </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <div class="formulario__grupo" id="grupo__color">
                        <label class="from-lab">COLOR</label>
                    <input type="text" class="form-inp text-uppercase @error('color') is-invalid @enderror" name="color" value="{{old('color')}}" placeholder="Ingrese la Color">
                    @error('color')
                    <span class="error text-danger" style=" font-size: 12px;">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    <span class="error text-danger">
                    <p class="formulario__input-error">*El formato SOLO puede contener letras*</p>
                  </span>
                </div>
                </div>
                <div class="col-sm-4">
                    <div class="formulario__grupo" id="grupo__tipoVehiculo">
                        <label class="from-lab">TIPO</label>
                    <input type="text" class="form-inp text-uppercase @error('tipoVehiculo') is-invalid @enderror" name="tipoVehiculo" value="{{old('tipoVehiculo')}}" placeholder="Ejemplo (VIEW C2)">
                    @error('tipoVehiculo')
                    <span class="error text-danger" style=" font-size: 12px;">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    <span class="error text-danger">
                    <p class="formulario__input-error">*El formato SOLO puede contener letras, numeros y guiones*</p>
                  </span>
                </div>
                </div>
                <div class="col-sm-4">
                    <div class="formulario__grupo" id="grupo__combustible">
                        <label class="from-lab">COMBUSTIBLE</label>
                    <input type="text" class="form-inp text-uppercase @error('combustible') is-invalid @enderror" name="combustible" value="{{old('combustible')}}" placeholder="Ingrese el Tipo de Combustible del Vehiculo">
                    @error('combustible')
                    <span class="error text-danger" style=" font-size: 12px;">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    <span class="error text-danger">
                    <p class="formulario__input-error">*El formato SOLO puede contener letras*</p>
                  </span>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="formulario__grupo" id="grupo__chasis">
                        <label class="from-lab">CHASIS N°</label>
                    <input type="text" class="form-inp text-uppercase @error('chasis') is-invalid @enderror" name="chasis" value="{{old('chasis')}}" placeholder="Ingrese el número de chasis ">
                    @error('chasis')
                    <span class="error text-danger" style=" font-size: 12px;">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    <span class="error text-danger">
                    <p class="formulario__input-error">*El formato SOLO puede contener letras, numeros y guiones*</p>
                  </span>
                </div>
                </div>
                <div class="col-sm-6">
                    <div class="formulario__grupo" id="grupo__capacidad">
                        <label class="from-lab">CAPACIDAD</label>
                <input type="text" class="form-inp text-uppercase @error('capacidad') is-invalid @enderror" name="capacidad" value="{{old('capacidad')}}" placeholder="Ingrese la Capacidad">
                @error('capacidad')
                <span class="error text-danger" style=" font-size: 12px;">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                <span class="error text-danger">
                <p class="formulario__input-error">*El formato SOLO puede contener letras y numeros *</p>
              </span>
                </div>
                </div>

              </div>
              <div class="row">
                <div class="col-sm-6">
                    <div class="formulario__grupo" id="grupo__motor">
                        <label class="from-lab">MOTOR N°</label>
                    <input type="text" class="form-inp text-uppercase @error('motor') is-invalid @enderror" name="motor" value="{{old('motor')}}" placeholder="Ingrese el número de motor">
                    @error('motor')
                    <span class="error text-danger" style=" font-size: 12px;">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    <span class="error text-danger">
                    <p class="formulario__input-error">*El formato SOLO puede contener letras, numeros y guiones*</p>
                  </span>
                </div>
                </div>
                <div class="col-sm-6">
                    <div class="formulario__grupo" id="grupo__asiento">
                        <label class="from-lab">NUMERO DE ASIENTOS</label>
                    <input type="number" class="form-inp text-uppercase @error('asiento') is-invalid @enderror" name="asiento" value="{{old('asiento')}}"placeholder="Ingrese el número de asientos">
                    @error('asiento')
                    <span class="error text-danger" style=" font-size: 12px;">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    <span class="error text-danger">
                    <p class="formulario__input-error">*El formato SOLO puede contener numeros*</p>
                  </span>
                </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12">
              <h6 style="color: #004a81;font-weight: bold;    font-family:castellar;">4.-DATOS DE GESTIÓN</h6>
             </div>
          </div>
      <div class="row">
        <div class="col-sm-2">
            <div class="formulario__grupo" id="grupo__anio">
                <label class="from-lab">GESTIÓN</label>
            <select id="disabledSelect" class="form-inp text-uppercase @error('anio') is-invalid @enderror" name="anio"  >
                <option value="{{old('anio')}}">Seleccione el año</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
                <option>2028</option>
              </select>
              @error('anio')
              <span class="error text-danger" style=" font-size: 12px;">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
        </div>
      </div>
              <div class="row">
                <div class="col-sm-12">
              <h6 style="color: #004a81;font-weight: bold;    font-family:castellar;">5.-LICENCIA VALIDA</h6>
             </div>
          </div>
          <br>
                <div class="col-sm-12  mb-3">
                    <div class="formulario__grupo row " id="grupo__fechaInicio">
                        <label class="col-sm-3 offset-sm-1  col-form-lab" style="text-align: right">DESDE:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-inp @error('fechaInicio') is-invalid @enderror" name="fechaInicio" value="{{old('fechaInicio')}}" >
                            @error('fechaInicio')
                            <span class="error text-danger" style=" font-size: 12px;">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label class="col-sm-1 col-form-label" style="text-align: right">HASTA:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-inp @error('fechaFin') is-invalid @enderror" name="fechaFin" value="{{old('fechaFin')}}" >
                            @error('fechaFin')
                            <span class="error text-danger" style=" font-size: 12px;">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-info" style="background-color: #004a81">REGISTRAR</button>
                        <a href="{{ route('cancelar', 'vehiculo.index') }}" class="btn btn-outline-secondary">CANCELAR</a>
                    </div>
                </div>
            </div>
    </div>
            </form>
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
