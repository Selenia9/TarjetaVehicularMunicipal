

@extends('adminlte::page')

@section('title', 'Vehiculos')

@section('content_header')

@stop
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">LISTA DE REGISTRO VENCIDOS</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-12 text-right">
            {{--  BOTONES DE EXPORTAR --}}
            <a href="{{ route('vehiculo.reportevencidaPDF')}}" class="btn btn-danger btn-sm"  >
            </i>vencido</a>
            </div>
          </div>
       {{--    <div class="col-sm-12">
            <h5>Buscar tarjeta emitidas por fechas</h5>
            {!! Form::open(array('url'=>'MUNICIPALIDAD-SACABA', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}

              <div class="form-group row ">
                  <label class="col-sm-1 col-form-label" style="text-align: right">DESDE:</label>
                  <div class="col-sm-2">
                      <input type="date" class="form-control" name="fromDate"  value="{{ $searchText }}">
                  </div>
                  <label class="col-sm-1 col-form-label" style="text-align: right">HASTA:</label>
                  <div class="col-sm-2">
                      <input type="date" class="form-control" name="toDate" value="{{ $searchText2 }}" >
                  </div>
                  <div class="col-sm-1">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Buscar</button>
   </div>
          </div>
          {{Form::close()}}
        </div>



              {{--------------------------------------------------------------------- buqueda --------------------------------}}
              <div class="col-sm-12">
                <h5>Buscar tarjeta Vencida por año</h5>
                {!! Form::open(array('url'=>'indexVencido', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}


                  <div class="form-group row ">
                    <div class="col-sm-2">
                        <select id="disabledSelect" class="form-select" name="anio">
                            <option>Seleccione el año</option>
                            <option>2020</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                          </select>
                    </div>
                    <div class="col-sm-1">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Buscar</button>
                    </div>
                  </div>
                  {{Form::close()}}
            </div>
          {{---------------------------------------------------------------------  /FIN de la busqueda --------------------------------}}

          <br>
          @if(session('datos'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('datos') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          @endif


          @if(session('cancelar'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('cancelar') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          @endif
          <table id="vencido" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>N°</th>
            <th>GESTION</th>
            <th>CÉDULA DE IDENTIDAD</th>
            <th>PROPIETARIO</th>
            <th>DIRECCIÓN</th>
            <th>TELEFONO</th>
            <th>ORGANIZACIÓN </th>
            <th>PLACA</th>
            <th>REGISTRO</th>
            <th>VENCIMIENTO</th>
            <th>ESTADO</th>
            <th>COLOR</th>
            <th>CHASIS</th>
            <th>MOTOR</th>
            <th>CAPACIDAD</th>
            <th>N° ASIENTO</th>
            <th>MODELO</th>
            <th>MARCA</th>
            <th>TIPO VEHICULO</th>
            <th>COMBUSTIBLE</th>
            <th>RUTA AUTORIZADA</th>
            <th>RESPONSABLE</th>
            <th>ACCION</th>
        </tr>
                </thead>
                <tbody>
                    @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{$vehiculo->n}}</td>
                    <td>{{$vehiculo->anio}}</td>
                    <td>{{$vehiculo->propietario->ci}}</td>
                    <td>{{$vehiculo->propietario->nombre}}</td>
                    <td>{{$vehiculo->propietario->domicilio}}</td>
                    <td>{{$vehiculo->propietario->telefono}}</td>
                    <td>{{$vehiculo->organizacion->nombre}}</td>
                    <td>{{$vehiculo->placa}}</td>
                    <td>{{$vehiculo->fechaInicio}}</td>
                    <td>{{$vehiculo->fechaFin}}</td>
                    <td>
                        @if ($vehiculo->fechaFin > $fechActual)
                        <span class="badge badge-info">{{ 'VIGENTE' }}</span>
                        @else
                        <span class="badge badge-danger"> {{ 'VENCIDA' }}</span>
                        @endif
                    </td>
                  <td>{{$vehiculo->color}}</td>
                  <td>{{$vehiculo->chasis}}</td>
                 <td>{{$vehiculo->motor}}</td>
                 <td>{{$vehiculo->capacidad}}</td>
                 <td>{{$vehiculo->asiento}}</td>
                 <td>{{$vehiculo->modelo}}</td>
                 <td>{{$vehiculo->marca}}</td>
                 <td>{{$vehiculo->tipoVehiculo}}</td>
                 <td>{{$vehiculo->combustible}}</td>
                 <td>{{$vehiculo->rutaAutorizada}}</td>
                 <td>{{$vehiculo->user->name}}</td>
                 {{--  <td>{{$vehiculo->user_id}}</td> --}}
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        @stop

        @section('css')
        @stop
        @section('js')
        <script>
            $(function () {
              $("#vencido").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
                "language": {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                        }
                  },

        dom: 'Bfrtip',
        buttons: [
            {
               /*  extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL' */
                extend: 'excelHtml5',
            autoFilter: true,
            sheetName: 'Exported data'
            }
        ]

              });
            });
          </script>
        @stop




