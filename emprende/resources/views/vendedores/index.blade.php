@extends('plantillas.plantilla')
@section('titulo', 'Emprendimientos')
@section('content')
<section>
    <div class="Section_Nav container">
        <div class="row text-center">
            <div class="Sec_Pro offset-lg-2 col-lg-2">
                <img src="imagenes/caja.png" alt="">
                <a href="/productos">Productos</a>
            </div>
            <div class="Sec_Emp col-lg-2">
                <img src="imagenes/cohete.png" alt="">
                <a href="/emprendimientos">Emprendimientos</a>
                <hr>
            </div>
            <div class="Sec_Ofe col-lg-2 ps-2">
                <img src="imagenes/oferta.png" alt="">
                <a href="">Ofertas</a>
            </div>
            <div class="Sec_Zona col-lg-2">
                <img src="imagenes/mapa.png" alt="">
                <a href="">En tu Zona</a>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        @foreach($vendedorCont as $vendedorVista)
        <div class="col-lg-6 md-6 mb-4 m-auto">
            <div class="d-flex align-items-center justify-content-center">
                <img src="imagenes/emprendimientos/{{$vendedorVista->logo}}" class="image-empren" alt="">
                <div class="box">
                    <h4>{{$vendedorVista->nom_emprendimiento}}</h4>
                    <p>{{$vendedorVista->descrip_emprendimiento}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection