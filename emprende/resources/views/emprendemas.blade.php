@extends('plantillas.plantilla')
@section('content')
<section>
<link rel="stylesheet" href="{!! asset('css/stylecard.css') !!}">
<div class="container-fluid p-0">

  <div id="carrousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="imagenes/carousel/carousel6.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="imagenes/carousel/carousel0000.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="imagenes/carousel/carousel00.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carrousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#carrousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>
    </div>
    <div class="container mt-5">
        <center>
        <h3 class="fw-bold">CATEGORÍAS</h3>
        </center>

        <div class="row mb-5">
    <!-- Card 1 -->
    <div class="col-lg-3 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/accesorios0.jpg" alt="">
                <div class="hover-1-content px-5 py-4">
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <span class="font-weight-light fw-bold">ACCESORIOS</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 2 -->
    <div class="col-lg-3 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/postres0.jpg" alt="">
                <div class="hover-1-content px-5 py-4">
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <span class="font-weight-light fw-bold">POSTRES Y COMIDA</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 3 -->
    <div class="col-lg-3 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/ropa.jpg" alt="">
                <div class="hover-1-content px-5 py-4">
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <span class="font-weight-light fw-bold">ROPA</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 4 -->
    <div class="col-lg-3 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/artesanias.jpg" alt="">
                <div class="hover-1-content px-5 py-4">
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <span class="font-weight-light fw-bold">ARTESANÍAS</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row mb-5">
    <!-- Card 5 -->
    <div class="col-lg-3 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/plantas.jpg" alt="">
                <div class="hover-1-content px-5 py-4">
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <span class="font-weight-light fw-bold">PLANTAS</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 6 -->
    <div class="col-lg-3 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/personal.jpg" alt="">
                <div class="hover-1-content px-5 py-4">
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <span class="font-weight-light fw-bold">CUIDADO PERSONAL</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 7 -->
    <div class="col-lg-3 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/servicios.jpg" alt="">
                <div class="hover-1-content px-5 py-4">
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <span class="font-weight-light fw-bold">SERVICIOS</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>

    <!-- Card 8 -->
    <div class="col-lg-3 mb-3 mb-lg-0 mb-sm-2 mt-4 mb-4">
        <a class="text-light" href="">
            <div class="hover hover-1 text-white rounded">
                <img src="imagenes/categorias/garaje.jpg" alt="">
                <div class="hover-1-content px-5 py-4">
                    <h3 class="hover-1-title text-uppercase mb-0">
                        <span class="font-weight-light fw-bold">VENTA DE GARAJE</span>
                    </h3>
                </div>
            </div>
        </a>
    </div>
</div>

        </div>
        </div>
        
    </div>

</section>


<!-- Incluir jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Incluir Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Incluir Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
