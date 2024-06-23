@extends('layouts.navbar')
@section('content')

<section>
<div class="Section_Nav container">
    <div class="row text-center">
        <div class="Sec_Pro offset-lg-1 col-lg-2 col-sm-6 mb-sm-1">
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
            <hr>
        </div>
    </div>
</div>
</section>

<div class="container">
    <h3 class="fw-semibold mb-5">Revisa tus pedidos</h3>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total compra</th>

            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->nombre_cl }}</td>
                <td>{{ $pedido->email_cl }}</td>
                <td>{{ $pedido->direccion }}</td>
                <td>{{ $pedido->telefono }}</td>
                <td>
                {{ $pedido->nombre_producto}}
                </td>
                <td>{{ $pedido->cantidad }}</td>
                <td>{{ $pedido->total }}</td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>
@endsection