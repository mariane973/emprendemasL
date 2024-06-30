<div class="container">
    <div class="row">
        <div class="container text-center mb-5 d-flex justify-content-center align-items-center">
            @can('crearProducto')
            <div class="Caja_Busqueda col-lg-8 ms-sm-5 ps-sm-3 col-sm-5 col-md-4">
            <a href="/emprendimientos/create" class="btn fw-semibold" style="background-color: #8FDABA; color: white;">
                    <i class="fas fa-plus me-1"></i> Crear Emprendimiento
                </a>
            </div>
                
            @endcan
            <div class="Caja_Busqueda col-lg-4 ms-sm-5 ps-sm-3 col-sm-5 col-md-4">
                <input wire:model.live='search' type="text" placeholder="Buscar un emprendimiento">
                <i class="fas fa-search"></i>
            </div>
        </div>
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
                            <button type="button" class="btn btn-danger" wire:click='eliminacion({{$vendedorVista->id}})'>
                                <i class="fas fa-trash-alt me-1"></i> Eliminar
                            </button>
                        @endcan
                    </div>                    
                    <a href="{{ route('vendedores.detalle', $vendedorVista->id) }}" class="btn btn-info text-center mt-3 text-white">
                        <i class="fas fa-eye me-1"></i> Ver Detalles
                    </a>
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