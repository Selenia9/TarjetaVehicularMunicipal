<!doctype html>
<html lang="en">
  <head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   </head>
   <style>
    .titulo{
        text-align: center;
    }
    table{
        margin-top: 50px;
        border-collapse: collapse;
    }
    th{
        background-color: rgb(188, 195, 237);
          color: #004a81;

    }
    td, th{
        border: 2px solid black;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

   </style>
  <body>
      <div>



            <div>
                <img src="vendor/adminlte/dist/img/Logo institucional horizonal azul plomo.png" alt="" width="500px">
                <img src="vendor/adminlte/dist/img/logoCHAPARE.png" alt="" width="190px" style="float: right;">
            </div>

              <div class="titulo">
                    <h1>REGISTRO TARJETA DE OPERACIÓN MUNICIPAL VENCIDAS </h1>
              </div>

              <div>
                    <table  >
                        <thead style="  border-collapse: collapse;">
                            <tr>
                                <th>CÉDULA DE
                                    <br>
                                    IDENTIDAD
                                </th>
                                <th>PROPIETARIO</th>
                                <th>DIRECCIÓN</th>
                                <th>TELEFONO</th>
                                <th>ORGANIZACIÓN </th>
                                <th>N°</th>
                                <th>GESTION</th>
                                <th>PLACA</th>
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
                                <th>FECHA DE REGISTRO</th>
                                <th>FECHA DE VENCIMIENTO</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>

                        <tbody style="  border-collapse: collapse;">
                            @forelse($vehiculos as $vehiculo)
                                <tr>
                                  <td>{{$vehiculo->propietario->ci}}</td>
                                  <td>{{$vehiculo->propietario->nombre}}</td>
                                  <td>{{$vehiculo->propietario->domicilio}}</td>
                                  <td>{{$vehiculo->propietario->telefono}}</td>
                                  <td>{{$vehiculo->organizacion->nombre}}</td>
                                  <td>{{$vehiculo->n}}</td>
                                  <td>{{$vehiculo->anio}}</td>
                                  <td>{{$vehiculo->placa}}</td>
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
                                  <td>{{$vehiculo->fechaInicio}}</td>
                                  <td>{{$vehiculo->fechaFin}}</td>
                                  <td>
                                    @if ($vehiculo->fechaFin > $fechActual)
                                        {{ 'VIGENTE' }}
                                    @else
                                        {{ 'VENCIDA' }}
                                    @endif
                                    {{-- {{$vehiculo->estado}} --}}
                                </td>


                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
  </body>
</html>
