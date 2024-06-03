<div class="container">
    @include('layouts.mensaje')
    <div class="row ms-4">
        @can('agregarVendedor')
        <div class="container text-center mb-5">
            <a href="/servicios/create" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Crear Servicio
            </a>
        </div>
        @endcan
        @foreach($servicioCont as $servicioVista)
        <div class="col-lg-6 md-6 mb-5">
            <div class="d-flex align-items-center justify-content-center">
                <img src="imagenes/servicios/{{$servicioVista->imagen}}" class="image-product" alt="">
                <div class="box">
                    <h4>{{$servicioVista->nombre}}</h4>
                    <p>{{$servicioVista->descripcion}}</p>
                    <p><strong>Precio: </strong>${{number_format($servicioVista->precio)}}</p>
                    @can('agregarCarrito')
                    <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro({{ $servicioVista->id }})">
                        <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                    </button>
                    @endcan
                    <div class="d-flex gap-2 mt-3">
                        @can('editarProducto')
                        <a href="/servicios/{{$servicioVista->id}}/edit" class="btn btn-success">
                            <i class="fas fa-edit me-1"></i> Editar
                        </a>
                        @endcan
                        @can('eliminarProducto')
                        <form action="/servicios/{{$servicioVista->id}}/confirmar" method="post">
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