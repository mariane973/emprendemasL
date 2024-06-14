@extends('layouts.navbar')
@section('titulo', 'Emprendimientos')
@section('content')
<section>
    <div class="Section_Nav container">
        <div class="row text-center">
            <div class="Sec_Pro offset-lg-2 col-lg-2 col-sm-6 mb-sm-1">
                <img src="imagenes/caja.png" alt="">
                <a href="/productos">Productos</a>
            </div>
            <div class="Sec_Zona col-lg-2  col-sm-6 mb-sm-5">
                <img src="imagenes/mapa.png" alt="">
                <a href="/servicios">Servicios</a>
            </div>
            <div class="Sec_Emp col-lg-2 col-sm-6 mb-sm-1">
                <img src="imagenes/cohete.png" alt="">
                <a href="/emprendimientos">Emprendimientos</a>
                <hr>
            </div>
            <div class="Sec_Ofe col-lg-2  col-sm-6 mb-sm-5">
                <img src="imagenes/oferta.png" alt="">
                <a href="/ofertas">Ofertas</a>
            </div>
            
        </div>
    </div>
</section>

<div class="container">
    <div class="row ms-4">
    @can('crearProducto')
    <div class="container text-center mb-5">
        <a href="/emprendimientos/create" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Crear mi Emprendimiento
        </a>
    </div>
    @endcan
        @foreach($vendedorCont as $vendedorVista)
        <div class="col-lg-6 md-6 mb-4">
            <div class="d-flex align-items-center justify-content-center">
                <img src="imagenes/emprendimientos/{{$vendedorVista->logo}}" class="image-empren" alt="">
                <div class="box">
                    <h4>{{$vendedorVista->nom_emprendimiento}}</h4>
                    <p>{{$vendedorVista->descrip_emprendimiento}}</p>
                    <div class="d-flex gap-2 mt-3">
                        @can('editarProducto')
                        <a href="/emprendimientos/{{$vendedorVista->id}}/edit" class="btn btn-success">
                            <i class="fas fa-edit me-1"></i> Editar
                        </a>
                        @endcan
                        @can('eliminarProducto')
                        <form action="/emprendimientos/{{$vendedorVista->id}}/confirmar" method="post">
                            @csrf
                            @method('get')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt me-1"></i> Eliminar
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection