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
                    <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro({{ $productoVista->id }})">
                        <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                    </button>
                    @endcan
                    <div class="d-flex gap-2 mt-3">
                        @can('editarProducto')
                        <a href="/productos/{{$productoVista->id}}/edit" class="btn btn-success">
                            <i class="fas fa-edit me-1"></i> Editar
                        </a>
                        @endcan
                        @can('eliminarProducto')
                        <form action="/productos/{{$productoVista->id}}/confirmar" method="post">
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