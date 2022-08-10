
@extends('adminlte::page')

@section('title', 'Organizaciones')

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
              <h3 class="card-title">LISTA DE ORGANIZACION</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">

                <div class="row">
                    <div class="col-12 text-right">
                        @can('organizacione_create')
                        <a href="{{ route('organizacion.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> NUEVO</a>
                        @endcan

                         </div>
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


                <table  class="table table-hover" id="organizacion">
                    <thead class="text-white" style="background-color: #004a81">

                    <th>NOMBRE DE ORGANIZACIÓN</th>
                    <th>Acción</th>

                </thead>
                <tbody>
                @foreach($organizaciones as $organizacion)
                    <tr>
                    <td>{{$organizacion->nombre}}</td>


                    <td>
                        @can('organizacione_edit')
                        <a href="{{ route('organizacion.edit',$organizacion->id)}}" class="btn btn-warning">
                            <i class="fas fa-pen"></i> </a><!--editar-->
                            @endcan
                            @can('organizacione_destroy')
                    <a href="{{ route('organizacion.confirm',$organizacion->id)}}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> </a><!--eliminar-->
                   @endcan
                    </td>

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

@stop

@section('css')
@stop

@section('js')
      <script>
        $(function () {
          $("#organizacion").DataTable({
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

          }).buttons().container().appendTo('#organizacion_wrapper .col-md-6:eq(0)');
        });
      </script>
@stop








