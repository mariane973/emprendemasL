@extends('layouts.navbar')
@section('titulo', 'Ofertas')
@section('content')
<section>
    <div class="Section_Nav container">
        <div class="row text-center">
            <div class="Sec_Pro offset-lg-2 col-lg-2 col-sm-6 mb-sm-1">
                <img src="imagenes/caja.png" alt="">
                <a href="/productos">Productos</a>
            </div>
            <div class="Sec_Emp col-lg-2 col-sm-6 mb-sm-1">
                <img src="imagenes/cohete.png" alt="">
                <a href="/emprendimientos">Emprendimientos</a>
            </div>
            <div class="Sec_Ofe col-lg-2  col-sm-6 mb-sm-5">
                <img src="imagenes/oferta.png" alt="">
                <a href="/ofertas">Ofertas</a>
                <hr>
            </div>
            <div class="Sec_Zona col-lg-2  col-sm-6 mb-sm-5">
                <img src="imagenes/mapa.png" alt="">
                <a href="">En tu Zona</a>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        @foreach($ofertaCont as $ofertaVista)
        <div class="col-lg-6 md-6 mt-3 d-flex justify-content-center">
            <div class="card mb-3" style="max-width: 480px;">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="imagenes/ofertas/{{$ofertaVista->imagen}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$ofertaVista->nombre}}</h4>
                        <del><p class="card-text mt-2">${{ number_format($ofertaVista->precio, 0)}}</p></del>
                        <p class="card-text-descuento mt-2">${{ number_format($ofertaVista->precioDescuento, 0)}}</p>
                        <div class="descuento mt-3">{{$ofertaVista->descuento}}%</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection