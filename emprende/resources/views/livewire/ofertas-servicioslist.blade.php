<div class="container">
    @include('layouts.mensaje')
    <div class="row ms-4">
        @foreach($ofertaCont  as $ofertaVista)
        <div class="col-lg-6 md-6 mt-3 d-flex justify-content-center">
            <div class="card mb-3" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-5 m-auto">
                        <img src="imagenes/servicios/{{$ofertaVista->imagen}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7 align-self-center">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$ofertaVista->nombre}}</h4>
                            <del><p class="card-text mt-2">${{ number_format($ofertaVista->precio, 0) }}</p></del>
                            <p class="card-text-descuento mt-2">${{ number_format($ofertaVista->valor_final, 0) }}</p>
                            @can('agregarCarrito')
                                <button type="button" class="btn btn-success mb-5" wire:click="agregarCarro({{ $ofertaVista->id }})">
                                    <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                                </button>
                            @endcan
                            @can('editarProducto')
                            <div class="d-flex justify-content-center gap-2 mb-5">
                                <a href="/servicios/{{$ofertaVista->id}}/edit" class="btn btn-success">
                                    <i class="fas fa-edit me-1"></i> Editar
                                </a>
                                <button type="button" class="btn btn-danger" wire:click='eliminacion({{$ofertaVista->id}})'>
                                    <i class="fas fa-trash-alt me-1"></i> Eliminar
                                </button>
                            </div>
                            @endcan
                            <div class="descuento">{{$ofertaVista->descuento}}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>