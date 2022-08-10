
@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')

@stop
@section('content')

    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">LISTA DE ROLES</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">

                <div class="row">
                    <div class="col-12 text-right">
                        @can('role_create')
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm" style="background-color: #004a81"><i class="fas fa-plus"> </i> NUEVO</a>
                        @endcan
                    </div>
                  </div>
                  <br>
                  <table  class="table table-hover" id="role">
                    <thead class="text-white" style="background-color: #004a81">
                        <th> Nombre </th>
                        <th> Guard </th>
                        <th> Fecha de creación </th>
                        <th> Permisos </th>
                        <th class="text-right"> Acciones </th>
                      </thead>
                      <tbody>
                        @forelse ($roles as $role)
                        <tr>
                          <td>{{ $role->name }}</td>
                          <td>{{ $role->guard_name }}</td>
                          <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                          <td>
                            @forelse ($role->permissions as $permission)
                                <span class="badge badge-info">{{ $permission->name }}</span>
                            @empty
                                <span class="badge badge-danger">No permission added</span>
                            @endforelse
                          </td>
                          <td class="td-actions text-right">
                              @can('role_show')
                          {{--   <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary">
                              <i class="fas fa-eye"></i></a> --}}


                              @endcan
                              @can('role_edit')
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">
                              <i class="fas fa-pen"></i></a>
                              @endcan
                              @can('role_destroy')
                            <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                              onsubmit="return confirm('areYouSure')" style="display: inline-block;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" rel="tooltip" class="btn btn-danger">
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
      $("#role").DataTable({
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


