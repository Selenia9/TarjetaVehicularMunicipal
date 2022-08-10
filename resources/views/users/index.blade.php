@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

@stop
@section('content')

    <div class="container-fluid">

      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">LISTA DE USUARIOS</h3>

            </div>
            <!-- /.card-header -->
            <br>
            <br>
            <div class="card-body">

                <div class="row">
                    <div class="col-12 text-right">
                        @can('user_create')
                       <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> NUEVO</a>
                        @endcan
                    </div>
                  </div>
                  <br>
                  <table  class="table table-hover" id="users">
                    <thead class="text-white" style="background-color: #004a81">

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Nombre Completo</th>
                        <th>Roles</th>
                        <th class="text-right">Acciones</th>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>
                                @forelse ($user->roles as $role)
                                  <span class="badge badge-info">{{ $role->name }}</span>
                                @empty
                                  <span class="badge badge-danger">No roles</span>
                                @endforelse
                              </td>
                            <td class="td-actions text-right">
                                @can('user_show')
                              <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">  <i class="fas fa-eye"></i></a>
                              @endcan
                                @can('user_edit')
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">   <i class="fas fa-pen"></i></a>
                              @endcan
                              @can('user_destroy')
                              <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                                  <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                              </form>
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


@stop

@section('css')

@stop

@section('js')
<script>
    $(function () {
      $("#users").DataTable({
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





