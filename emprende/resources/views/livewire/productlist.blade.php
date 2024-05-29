<div class="container mt-3">
    @include('layouts.mensaje')
    <div class="row ms-4">
        @foreach($productoCont as $productoVista)
        <div class="col-lg-6 md-6 mb-5">
            <div class="d-flex align-items-center justify-content-center">
                <img src="imagenes/productos/{{$productoVista->imagen}}" class="image-product" alt="">
                <div class="box">
                    <h4>{{$productoVista->nombre}}</h4>
                    <p>{{$productoVista->descripcion}}</p>
                    <p><strong>Precio: </strong>${{$productoVista->precio}}</p>
                    @can('comprarProducto')
                    <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro({{ $productoVista->id}})">Agregar al Carrito</button>
                    @endcan
                    @can('editarProducto')
                    <button type="button" class="btn btn-primary mt-1">Editar</button>
                    @endcan
                    @can('eliminarProducto')
                    <button type="button" class="btn btn-danger mt-1">Eliminar</button>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>