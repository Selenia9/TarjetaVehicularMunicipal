<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .simple{
width: 100px;
text-align: center;
color: red;
border-top-right-radius : 5px; /* Borde superior derecho, con un radio de 5 pixels */
border-bottom-right-radius : 5px; /* Borde inferior derecho, con un radio de 5 pixels */
border-bottom-left-radius : 5px; /* Borde inferior izquierdo, con un radio de 5 pixels */
border-top-left-radius : 5px; /* Borde superior izquierdo, con un radio de 5 pixels */
border-radius: 1em 0; /* Los 4 bordes, con un radio de 5 pixels */
border:3px solid rgb(55, 50, 142); /* color del borde */
             }
    </style>
</head>
<body>
    <section class="content">
        <div class="container-fluid">

          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header" style="background-color:rgb(52, 38, 155) ;">
                    <div class="row">
                        <div class="col-sm-12" >
                            <img src="/public/vendor/adminlte/dist/img/logo.png" alt="" width="180px">
                          <div class="row">
                            <div class=" col-sm-12">
                                <h1 style="color: white; text-align: center;">BIENVENIDOS</h1>
                            </div>

                          </div>
                        </div>
                      </div>


                </div>
                <div class="row  ">
                    <div class=" col-sm-12 offset-sm-5  ">
                <h5 class="simple"> numero</h5>
                </div>
                </div>

                <!-- /.card-header -->
                <br>
                <br>
                <div class="card-body" >
                    <div class="row">
                      <!--Start third-->
                      <div class="col-md-5 offset-sm-3 " >
                        <div class="card card-user">
                          <div class="card-body">
                            <table class="table table-bordered table-striped">
                              <tbody>
                                <tr>
                                  <th>PROPIETARIO</th>
                                  <td>{{$vehiculo->propietario->nombre}}</td>
                                </tr>
                                <tr>
                                  <th>ORGANIZACIÓN</th>
                                  <td>{{$vehiculo->organizacion->nombre}}</td>
                                </tr>
                                <tr>
                                  <th>MARCA</th>
                                  <td>{{$vehiculo->marca}}</td>
                                </tr>
                                <tr>
                                    <th>TIPO VEHICULO</th>
                                    <td>{{$vehiculo->tipoVehiculo}}</td>
                                </tr>
                                <tr>
                                    <th>FECHA VÁLIDA</th>
                                    <td>{{$vehiculo->fechaFin}}</td>
                                  </tr>


                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--end third-->

                    </div>
                  </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    </div>


    </div><!-- /.container-fluid -->
    </section>
</body>
</html>
