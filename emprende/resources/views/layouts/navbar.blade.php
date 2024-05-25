<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{!! asset('css/principal.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/produempren.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/stylecard.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/usustyle.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/home.css') !!}">
    <link rel="shortcut icon" type="image/png" href="imagenes/icon-tucan.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body  class="@yield('body-class', 'bg')">
    <nav>   
        <div class="Navbar container-fluid ">    
            <div class="row ">
                <div class="Logo col-lg-2 ms-sm-4 col-sm-2 me-sm-2 pe-sm-5 mb-sm-4 col-md-1 col-xs-1 me-xs-5">
                    <a href="/" class="fw-bold">
                        <img src="imagenes/logo.png" alt="">
                    </a>
                </div>
                <div class="Caja_Busqueda col-lg-5 ms-lg-5 me-lg-2 ms-sm-5 ps-sm-5 col-sm-7 mb-sm-4 col-md-4 offset-sm-2">
                    <input type="text" placeholder="Buscar un emprendedor o producto..."></input>
                </div>
                <div class="InicioSesion col-lg-2 col-sm-5 mb-sm-4">
                    <div class="Usuario col ms-4">
                    <i class="fas fa-shopping-cart icono" style="font-size: 25px; vertical-align: middle;"></i>
                        <a href="/productos" class="fw-bold ms-1">Productos</a>
                    </div>
                </div>
                <div class="InicioSesion col-lg-2 col-sm-4  mb-sm-4 col-md-3">
                    @guest
                        <div class="Usuario col " style="display: flex; align-items: center;">
                        <i class="fas fa-user-circle iconos" style="font-size: 30px; vertical-align: middle;"></i>
                            <a href="{{ route('login') }}"  class="fw-bold ms-2">Iniciar Sesión</a>
                        </div>
                    @else
                        <div class="Usuario col">
                            <div class="dropdown" id="userDropdown">
                            <i class="fas fa-user-circle iconon" style="font-size: 30px; vertical-align: middle;"></i>
                                <span class="fw-bold" id="userName" style="vertical-align: middle;">{{ Auth::user()->name }}</span>
                                <div class="dropdown-content">
                                    <a href="{{ route('profile') }}">Perfil</a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <hr>
    </div>
    <main class="py-4">
        @yield('content')
    </main>

<footer class="bg-body-tertiary text-center mt-5">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
        <!-- Facebook -->
        <a
        data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #3b5998;"
            href="#!"
            role="button"
            ><i class="fab fa-facebook-f"></i
        ></a>

        <!-- Twitter -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #55acee;"
            href="#!"
            role="button"
            ><i class="fab fa-twitter"></i
        ></a>

        <!-- Google -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #dd4b39;"
            href="#!"
            role="button"
            ><i class="fab fa-google"></i
        ></a>

        <!-- Instagram -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #ac2bac;"
            href="#!"
            role="button"
            ><i class="fab fa-instagram"></i
        ></a>

        <!-- Linkedin -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #0082ca;"
            href="#!"
            role="button"
            ><i class="fab fa-linkedin-in"></i
        ></a>
        <!-- Github -->
        <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-1"
            style="background-color: #333333;"
            href="#!"
            role="button"
            ><i class="fab fa-github"></i
        ></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        <p class="text-body">&copy; 2024 Company, Inc</p>
    </div>
    <!-- Copyright -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

<script>
    // Función para mostrar/ocultar las opciones del menú
    function toggleDropdown() {
        var dropdown = document.getElementById("userDropdown");
        dropdown.classList.toggle("show");
    }
</script>

