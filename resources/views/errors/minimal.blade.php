
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>



        <style>
           body{
                background: linear-gradient( to right,  #1f1f1f, #1162ac, cyan);

                margin: 0;
                padding: 0;
                height: 100vh;
                font-family: 'Open Sans', sans-serif;
}
img{
    width: 10%;
}
.container{
    font-size: 30px;
    height: 100vh;
    display: flex;
    color: aliceblue;
    flex-direction: column;
    gap: 30px;
    align-items: center;
    justify-content: center;
}
h1{
    color: rgb(233, 238, 245);
    font-size: 20px;
    padding: 20px;
}
.boton{
    padding: 13px 30px;
    font-size: 10px;
    border-radius: 15px;
    border: none;
    background: rgb(5, 129, 245);
    color: white;
}

@media screen and (max-width:630px){
    h1{
        font-size: 16px;
    }
}
        </style>
    </head>


    <body>


    <div class="container">

        <img src="vendor/adminlte/dist/img/logoerror.png" alt="">
        @yield('code')
        @yield('message')
        <div >
           <a class="boton" href="{{ route('home') }}">VOLVER ATRAS</a>
        </div>
    </div>
    </body>
</html>
