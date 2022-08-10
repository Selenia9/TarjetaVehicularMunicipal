<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('/css/app.css') }}">
    <title>Document</title>
</head>
<style>
/* 11arriba 11derecha 80 abajo 0hizquierda*/

@page {
                margin: 18px 10px 14px 14px;
      }
 body{
    background-image: url(vendor/adminlte/dist/img/fondo.jpeg);
    background-size: cover;
    opacity: 0.1;

}
html {
  line-height: 1.5; /* 1 */
  -webkit-text-size-adjust: 100%; /* 2 */
  -moz-tab-size: 4; /* 3 */
  -o-tab-size: 4;
     tab-size: 4; /* 3 */
  font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; /* 4 */
}
h1,
h3
 {
  font-size: inherit;
  font-weight: inherit;
}
table {
  text-indent: 0; /* 1 */
  border-color: inherit; /* 2 */
  border-collapse: collapse; /* 3 */
}

h1,
h3,
p{
  margin: 0;
}
.titulo{

    font-size: 28px;
    color: white;
    text-align: center;
}
.subt{
    font-size: 15px;
    color: white;
    text-align: center;
}

#h3letras,#h3letrade{
    font-size: 14px;
    color:rgb(20, 20, 131);
}
#h3letrade{

     text-align: center;
}
#h3letrafecha{
    font-size: 14px;
    color:rgb(20, 20, 131);

}
#h3fildos{
    width: 115px;
    font-size: 14px;
    color:rgb(20, 20, 131);
}
#pgenerado{
    font-size: 14px;

      border-width: 0px 0px 2px 0px;
  border-color:  rgb(0, 0, 0) ;
  border-style: dotted ;
}
.firma{
    font-size: 12px;

      border-width: 2px 0px 0px 0px;
  border-color:  rgb(0, 0, 0) ;
  border-style: dotted ;
}
.footer{
    font-size: 9px;
    text-align: center;
}
</style>
<body>
    <table style="  border: rgb(3, 31, 75) 3px solid; " >

    <tbody>

            <tr style="  background-color: rgb(44, 72, 130); ">
                    <td></td>
                    <td rowspan="2"> <img src="vendor/adminlte/dist/img/Logo institucional horizonal blanco.png" alt="" width="115px"></td>
                    <td colspan="9"> <h1 class="titulo">TARJETA DE OPERACION MUNICIPAL</h1>
                        <p class="subt">SERVICIO DE TRANSPORTE PUBLICO TERRESTE DE PASAJEROS Y CARGA</p>
                    </td>
            </tr>
             <tr style="  background-color:rgb(44, 72, 130); color: white;">
                    <td></td>
                    <td></td>
                    <td> GESTION:</td>
                    <td>{{ $vehiculo->anio }}</td>
                    <td></td>
                    <td> </td>
                    <td></td>
                    <td style=" background-color:white; color:red; border: rgb(3, 31, 75) 1px solid;   text-align: center;  font-size: 19px;">{{ $vehiculo->n}}</td>
                    <td></td>
                    <td></td>
            </tr>
            <tr>
                    <td></td>
                    <td colspan="1"><h3 id="h3fildos">ORGANIZACION</h3></td>
                    <td colspan="9"><p id="pgenerado">{{$vehiculo->organizacion->nombre}}</p></td >

            </tr>
            <tr>
                    <td></td>
                    <td colspan="1"><h3 id="h3fildos">PROPIETARIO</h3></td>
                    <td colspan="9"><p id="pgenerado">{{$vehiculo->propietario->nombre}}</p></td >

                    </tr>
            <tr>
                   <td></td>
                   <td ><h3 id="h3fildos">DOMICILIO</h3></td>
                   <td colspan="6"><p id="pgenerado">{{$vehiculo->propietario->domicilio}}</p></td >
                   <td ><h3 id="h3fildos">TELEFONO</h3></td>
                   <td colspan="2"><p id="pgenerado">{{$vehiculo->propietario->telefono}}</p></td >

           </tr>
            <tr>
                    <td colspan="11"><p style="text-align: center;  height: 30px; background-color:rgb(44, 72, 130);  font-size: 23px; color:white;">VEHICULO</p></td>
            </tr>
            <tr>
                    <td></td>
                    <td><h3 id="h3letras" >PLACA</h3></td>
                    <td colspan="2"> <p id="pgenerado">{{ $vehiculo->placa }}</p></td>
                    <td><h3 id="h3letrade">MARCA:</h3></td>
                    <td colspan="3"><p id="pgenerado">{{ $vehiculo->marca }}</p></td>
                    <td><h3 id="h3letrade">MODELO:</h3></td>
                    <td colspan="2" ><p id="pgenerado">{{ $vehiculo->modelo }}</p></td>

            </tr>

            <tr>
                    <td></td>
                    <td><h3 id="h3letras">COLOR</h3></td>
                    <td colspan="2"><p id="pgenerado">{{ $vehiculo->color }}</p></td>
                    <td><h3 id="h3letrade">TIPO:</h3></td>
                    <td colspan="3"><p id="pgenerado">{{ $vehiculo->tipoVehiculo }}</p></td>
                    <td ><h3 id="h3letrade">COMBUSTIBLE:</h3></td>
                    <td colspan="2"><p id="pgenerado">{{ $vehiculo->combustible }}</p></td>

            </tr>
            <tr>
                    <td></td>
                    <td><h3 id="h3letras">CHASIS</h3></td>
                    <td colspan="6"><p id="pgenerado">{{ $vehiculo->chasis }}</p></td>
                    <td ><h3 id="h3letrade">CAPACIDAD:</h3></td>
                    <td colspan="2"><p id="pgenerado">{{ $vehiculo->capacidad }}</p></td>

            </tr>
            <tr>
                    <td></td>
                    <td><h3 id="h3letras">MOTOR</h3></td>
                    <td colspan="6"><p id="pgenerado">{{ $vehiculo->motor }}</p></td>
                    <td><h3 id="h3letrade">ASIENTOS</h3></td>
                    <td colspan="2"><p id="pgenerado">{{ $vehiculo->asiento }}</p></td>

            </tr>
            <tr>
                    <td></td>
                    <td colspan="2"><h3 id="h3letras">RUTA AUTORIZADA</h3></td>
                    <td colspan="8"><p id="pgenerado">{{ $vehiculo->rutaAutorizada }}</p></td >
            </tr>
             <tr>
                    <td></td>

                    <td colspan="3" ><h3 id="h3letrafecha">LICENCIA VALIDAD DESDE:</h3></td>
                    <td colspan="2"><p id="pgenerado" style="color: red">{{ $f }}</p></td>
                    <td ><h3 id="h3letrafecha" style="text-align: center">AL:</h3></td>
                    <td colspan="2"><p id="pgenerado" style="color: red">{{ $ff }}</p></td>

                    <td></td>
                    <td></td>
             </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="3">
                                 <img src="{{ public_path('/qrcodes/qrcode.svg') }}" alt="">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="4"><h5 class="firma" style="text-align: center">Responsable Movilidad Municipal</h5></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="11"><p class="footer">DIRECCION PASAJE CONSISTORIAL S-002 TELF:4701677-lnt.2005</p></td>

                    </tr>

      </tbody>

      </table>



</body>
</html>
