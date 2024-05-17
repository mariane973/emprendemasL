@extends('plantillas.plantilla')
@section('titulo', 'Productos')
@section('content')
<section>
    <div class="Section_Nav container">
        <div class="row text-center">
            <div class="Sec_Pro offset-lg-2 col-lg-2 col-sm-6 mb-sm-1">
                <img src="imagenes/caja.png" alt="">
                <a href="/productos">Productos</a>
                <hr>
            </div>
            <div class="Sec_Emp col-lg-2 col-sm-6 mb-sm-1">
                <img src="imagenes/cohete.png" alt="">
                <a href="/emprendimientos">Emprendimientos</a>
                
            </div>
            <div class="Sec_Ofe col-lg-2  col-sm-6 mb-sm-5">
                <img src="imagenes/oferta.png" alt="">
                <a href="">Ofertas</a>
            </div>
            <div class="Sec_Zona col-lg-2  col-sm-6 mb-sm-5">
                <img src="imagenes/mapa.png" alt="">
                <a href="">En tu Zona</a>
            </div>
        </div>
    </div>
</section>

<div class="container mt-3">
    <div class="row">
        @foreach($productoCont as $productoVista)
        <div class="col-lg-6 md-6 mb-4 m-auto">
            <div class="d-flex align-items-center justify-content-center">
                <img src="imagenes/productos/{{$productoVista->imagen}}" class="image-product" alt="">
                <div class="box">
                    <h4>{{$productoVista->nombre}}</h4>
                    <p>{{$productoVista->descripcion}}</p>
                    <p><strong>Precio: </strong>${{$productoVista->precio}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection