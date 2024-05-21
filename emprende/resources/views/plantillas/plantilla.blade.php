<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{!! asset('css/principal.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/produempren.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/stylecard.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/usustyle.css') !!}">
    <link rel="shortcut icon" type="image/png" href="imagenes/icon-tucan.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
  <body>
    <nav>   
        <div class="Navbar container-fluid ">    
            <div class="row ">
                <div class="Logo col-lg-2 ms-sm-4 col-sm-2 me-sm-2 pe-sm-5 mb-sm-4 col-md-1 col-xs-1 me-xs-5">
                    <a href="/" class="fw-bold">
                        <img src="imagenes/logo.png"  alt="">
                    </a>
                </div>
                <div class="Caja_Busqueda col-lg-5 ms-lg-5 me-lg-1  ms-sm-5 ps-sm-5  col-sm-7  mb-sm-4 col-md-4 offset-sm-2">
                    <input type="text" placeholder="Buscar un emprendedor o producto... "></input>
                </div>
                <div class="Inicio_Sesion col-lg-2 offset-sm-3 col-sm-4 ms-lg-4 mb-sm-4  col-md-3 ">
                    <div class="Usuario col">
                        <img src="imagenes/usuario.png" alt="" srcset="">
                        <a href="/login" class="fw-bold">Iniciar Sesion</a>
                    </div>
                </div>
                <div class="Inicio_Sesion col-lg-2 col-sm-5 mb-sm-4 ">
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

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2024 Company, Inc</span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fab fa-twitter" style="font-size: 24px; width: 24px; line-height: 24px;"></i></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fab fa-instagram" style="font-size: 24px; width: 24px; line-height: 24px;"></i></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><i class="fab fa-facebook" style="font-size: 24px; width: 24px; line-height: 24px;"></i></a></li>
            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>