<div class="container">
    @include('layouts.mensaje')
    <div class="row">
        <div class="container text-center mb-5 d-flex justify-content-center align-items-center">
            @can('agregarVendedor')
            <div class="Caja_Busqueda col-lg-8 ms-sm-5 ps-sm-3 col-sm-5 col-md-4">
            <a href="/servicios/create" class="btn fw-semibold" style="background-color: #8FDABA; color: white;">
                    <i class="fas fa-plus me-1"></i> Crear Servicio
                </a>
            </div>
                
            @endcan
            <div class="Caja_Busqueda col-lg-4 ms-sm-5 ps-sm-3 col-sm-5 col-md-4">
                <input wire:model.live='search' type="text" placeholder="Buscar un servicio">
                <i class="fas fa-search"></i>
            </div>
        </div>
        @foreach($servicioCont as $servicioVista)
        <div class="col-lg-6 md-6 mb-5">
            <div class="d-flex align-items-center justify-content-center position-relative">
                @if($servicioVista->descuento > 0)
                    <span class="badge bg-danger position-absolute rounded-pill top-0 start-0 mt-3" style="margin-left: 4rem;">
                        {{ $servicioVista->descuento }}% dcto
                    </span>
                @endif
                <img src="imagenes/servicios/{{$servicioVista->imagen}}" class="image-product" alt="">
                <div class="box">
                    <h4>{{$servicioVista->nombre}}</h4>
                    <p>{{$servicioVista->descripcion}}</p>
                    <p><strong>Precio: </strong>${{number_format($servicioVista->valor_final)}}</p>
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
                            <button type="button" class="btn btn-danger" wire:click='eliminacion({{$servicioVista->id}})'>
                                <i class="fas fa-trash-alt me-1"></i> Eliminar
                            </button>
                        @endcan
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