<div class="container">
    <div class="row ms-4">
    @can('crearProducto')
    <div class="container text-center mb-5">
        <a href="/emprendimientos/create" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Crear mi Emprendimiento
        </a>
    </div>
    @endcan
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
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>