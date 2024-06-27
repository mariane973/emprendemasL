<div class="container">
    @include('layouts.mensaje')
    <div class="row">
        <div class="Caja_Busqueda container text-center mb-5 d-flex justify-content-center align-items-center">
            @can('agregarVendedor')
                <div class="Caja_Busqueda col-lg-8 justify-content-start ms-sm-5 ps-sm-3 col-sm-5 col-md-4">
                    <a href="/productos/create" class="btn fw-semibold" style="background-color: #8FDABA; color: white;">
                        <i class="fas fa-plus me-1"></i> Crear Producto
                    </a>
                </div>
            @endcan

            @can('agregarCarrito')
                <div class="Caja_Busqueda  justify-content-start btn dropdown">
                    <select wire:model="categoriaSeleccionada" class=" btn dropdown-toggle fw-semibold" type="button" wire:change="filtrarPorCategoria" style="background-color: #8FDABA; color: white;">
                        <option value="">Todas las categorías</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            @endcan

            <div class="Caja_Busqueda col-lg-4 justify-content-end ms-sm-5 ps-sm-3 col-sm-5 col-md-4">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Buscar un producto">
                <i class="fas fa-search"></i>
            </div>
        </div>

        @foreach($productoCont as $productoVista)
            <div class="col-lg-6 md-6 mb-5">
                <div class="d-flex align-items-center justify-content-center position-relative">            
                    @if($productoVista->descuento > 0)
                        <span class="badge bg-danger position-absolute rounded-pill top-0 start-0 mt-3" style="margin-left: 4rem;">
                            {{ $productoVista->descuento }}% dcto
                        </span>
                    @endif
                    <img src="imagenes/productos/{{$productoVista->imagen}}" class="image-product" alt="">
                    <div class="box">        
                        <h4>{{ $productoVista->nombre }}</h4>
                        <p>{{ $productoVista->descripcion }}</p>
                        @if($productoVista->cantidad && $productoVista->medida)
                            <p>{{ $productoVista->cantidad }} {{ $productoVista->medida }}</p>
                        @endif
                        <p><strong>Precio: </strong>${{ number_format($productoVista->valor_final) }}</p>
                        
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

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('productosActualizados', productos => {
            // Actualizar la lista de productos en la vista
            // Puedes manipular el DOM para actualizar la lista de productos
        });
    });
</script>
