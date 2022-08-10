
@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')

@stop
@section('content')

    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">LISTA DE PERMISOS</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">

                <div class="row">
                    <div class="col-12 text-right">
                        @can('permission_create')
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> NUEVO</a>
                        @endcan
                    </div>
                  </div>
                  <br>
                  <table  class="table table-hover" id="permiso">
                    <thead class="text-white" style="background-color: #004a81">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Guard</th>
                        <th>Created_at</th>
                        <th >Acciones</th>
                      </thead>
                      <tbody>
                        @forelse ($permissions as $permission)
                        <tr>
                          <td>{{ $permission->id }}</td>
                          <td>{{ $permission->name }}</td>
                          <td>{{ $permission->guard_name }}</td>
                          <td>{{ $permission->created_at }}</td>
                          <td >
                            @can('permission_show')
                  {{--           <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i></a> --}}

                                @endcan
                                @can('permission_edit')
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">
                                <i class="fas fa-pen"></i></a>
                                @endcan
                                @can('permission_destroy')
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" rel="tooltip">
                                <i class="fas fa-trash-alt"></i>
                              </button>
                            </form>
                            @endcan
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="2">Sin registros.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
</div><!-- /.container-fluid -->


@stop

@section('css')
@stop

@section('js')
<script>
    $(function () {
      $("#permiso").DataTable({
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
                  }
      })
    });
  </script>
@stop









