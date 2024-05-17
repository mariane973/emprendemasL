<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{!! asset('css/principal.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/produempren.css') !!}">
    <link rel="shortcut icon" type="image/png" href="imagenes/icon-tucan.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
  <body>
    <nav>   
        <div class="Navbar container-fluid ">    
            <div class="row">
                <div class="Logo col-lg-3 ms-1">
                    <img src="imagenes/logo.png" alt="">
                </div>
                <div class="Caja_Busqueda col-lg-5 me-5">
                    <input type="text" placeholder="Buscar un emprendedor o producto... "></input>
                    <i class="fas fa-magnifying-glass"></i>
                </div>
                <div class="Inicio_Sesion col-lg-2">
                    <a href="/login">Iniciar Sesion</a>
                </div>

                <div class="Inicio_Sesion col-lg-1 ms-4">
                    <div class="Usuario col">
                            <img src="imagenes/carrito.png" alt="" srcset="">
                            <a href="/productos" class="fw-bold ms-1">Productos</a>
                        </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <hr>
    </div>
    
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>