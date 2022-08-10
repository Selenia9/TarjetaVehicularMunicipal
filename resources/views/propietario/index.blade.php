
@extends('adminlte::page')

@section('title', 'Propietarios')

@section('content_header')

@stop
@section('content')
  <section class="content">
    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">LISTA DE PROPIETARIOS</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">
                <div style="margin-left: 50px; ">

                </div>
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


                  <table  class="table table-hover" id="propietario">
                    <thead class="text-white" style="background-color: #004a81">

                    <tr>
                        <th>CÉDULA DE IDENTIDAD</th>
                        <th>NOMBRE COMPLETO</th>
                        <th>DOMICILIO</th>
                        <th>TELEFONO</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach($propietarios as $propietario)
                      <tr>
                        <th scope="row">{{$propietario->ci}}</th>
                        <td>{{$propietario->nombre}}</td>
                        <td>{{$propietario->domicilio}}</td>
                        <td>{{$propietario->telefono}}</td>
                </tr>
                @endforeach
                </tbody>
                </table>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->
</section>
<!--
    //MODAL
<div class="modal fade" id="showModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
      <p class="card-category">CREAR PROPIETARIO</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
              <div class="col-md-12">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                             .....................................
                        </div>
                     </p>
                    </div>
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <a " class="btn btn-primary"> Editar </a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> -->

@stop

@section('css')


@stop

@section('js')

<script>
    $(function () {
      $("#propietario").DataTable({
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
        "buttons": [ "csv", "excel", "pdf", "print"]

      }).buttons().container().appendTo('#propietario_wrapper .col-md-6:eq(0)');
    });
  </script>
@stop
















