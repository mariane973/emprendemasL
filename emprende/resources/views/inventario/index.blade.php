@extends('layouts.navbar')
@section('titulo', 'Inventario')
@section('content')
<section>
<div class="Section_Nav container">
    <div class="row text-center d-flex justify">
        <div class="Sec_Pro col-lg-2 col-sm-6 mb-sm-1">
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
           
        </div>

        <div class="dropdown col-lg-2" id="userDropdown">
            <img src="imagenes/oferta.png" alt="">
            <a href="/ofertas">Ofertas</a>
            <div class="dropdown-content">
                <a href="/ofertas">Ofertas productos</a>
                <a href="/ofertas_servicios">Ofertas servicios</a>
            </div>
        </div>
    
        <div class="Sec_Ofe col-lg-2  col-sm-6">
            <img src="imagenes/oferta.png" alt="">
            <a href="/pedidos_index">Pedidos</a>            
        </div>

        @can('agregarVendedor')
        <div class="Sec_Ofe col-lg-2  col-sm-6">
            <img src="imagenes/oferta.png" alt="">
            <a href="/inventario">Inventario</a>
            <hr>
        </div>
        @endcan
    </div>
</div>
</section>

<div class="container">
    <h3 class="fw-semibold mb-5 text-center">Inventario</h3>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventario as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>
                    <form action="{{ route('inventario.actualizarStock', $item->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="number" name="stock" value="{{ $item->stock }}" class="form-control">
                </td>
                <td>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection