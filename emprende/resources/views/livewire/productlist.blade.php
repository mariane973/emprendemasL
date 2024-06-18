<div class="container">
    @include('layouts.mensaje')
    <div class="row ms-4">
        @can('agregarVendedor')
        <div class="container text-center mb-5">
            <a href="/productos/create" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Crear Producto
            </a>
        </div>
        @endcan
        @foreach($productoCont as $productoVista)
        <div class="col-lg-6 md-6 mb-5">
            <div class="d-flex align-items-center justify-content-center">
                <img src="imagenes/productos/{{$productoVista->imagen}}" class="image-product" alt="">
                <div class="box">
                    <h4>{{$productoVista->nombre}}</h4>
                    <p>{{$productoVista->descripcion}}</p>
                    <p><strong>Precio: </strong>${{number_format($productoVista->valor_final)}}</p>
                    
                    @if($productoVista->stock > 0)
                        @can('agregarCarrito')
                        <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro({{ $productoVista->id }})">
                            <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                        </button>
                        @endcan

                        @if ($productoVista->stock <= 10)
                            @can('editarProducto')
                                <p class="text-warning"><strong>¡Quedan {{ $productoVista->stock }} unidades disponibles!</strong></p>
                            @endcan                    
                        @endif
                    @else
                        <p class="text-danger"><strong>No hay stock disponible.</strong></p>
                    @endif

                    <div class="d-flex gap-2 mt-3">
                        @can('editarProducto')
                        <a href="/productos/{{$productoVista->id}}/edit" class="btn btn-success">
                            <i class="fas fa-edit me-1"></i> Editar
                        </a>
                        @endcan
                        @can('eliminarProducto')
                            <button type="button" class="btn btn-danger" wire:click='eliminacion({{$productoVista->id}})'>
                                <i class="fas fa-trash-alt me-1"></i> Eliminar
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>