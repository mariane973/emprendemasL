<div class="container">
    @include('layouts.mensaje')
    <div class="row">
        <div class="container mb-5 d-flex justify-content-center align-items-center">
            <div class="Caja_Busqueda col-lg-4 col-md-4 ps-sm-3 col-sm-4 col-md-4">
                <input wire:model.live='search' type="text" placeholder="Buscar una oferta">
                <i class="fas fa-search"></i>
            </div>
        </div>
        @foreach($ofertaCont  as $ofertaVista)
        <div class="col-lg-6 md-6 mt-3 d-flex justify-content-center">
            <div class="card mb-3" style="max-width: 450px;">
                <div class="row g-0">
                    <div class="col-md-5 m-auto ps-2 py-2">
                        <img src="imagenes/servicios/{{$ofertaVista->imagen}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$ofertaVista->nombre}}</h4>
                            <div class="row">
                                <div class="col col-6">
                                    <del><p class="card-text mt-2">${{ number_format($ofertaVista->precio, 0) }}</p></del>
                                </div>
                                <div class="col col-6">
                                    <p class="card-text-descuento mt-2">${{ number_format($ofertaVista->valor_final, 0) }}</p>
                                </div>
                            </div>
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
                            <div class="descuento">{{$ofertaVista->descuento}}% off</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if($sinResultados)
        <div class="alert alert-success text-center mb-5" role="alert">
            {{ $sinResultados }}
        </div>
    @endif
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('show-no-results-alert', () => {
            document.querySelector('.alert').style.display = 'block';
        });
    });
</script>