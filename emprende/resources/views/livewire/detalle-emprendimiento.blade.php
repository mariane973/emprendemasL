<div class="container">
<h3 class="fw-semibold mb-4 text-center">{{ $vendedor->nom_emprendimiento }}</h3>
    <p class="text-center mb-4">{{ $vendedor->descrip_emprendimiento }}</p>
    <div class="row">
        <div class="col col-6">
            <p class="text-center"><b>Teléfono: </b>{{ $vendedor->telefono }}</p>
            <p class="text-center"><b>Correo: </b>{{ $vendedor->user->email }}</p>
        </div>
        <div class="col col-6">
            <p class="text-center"><b>Dirección: </b>{{ $vendedor->direccion }}</p>
            <p class="text-center"><b>Ciudad </b>{{ $vendedor->ciudad }}</p>
        </div>
    </div>


    <h3 class="fw-semibold mt-4 mb-5 text-center">PRODUCTOS</h3>
    @if($productos->isEmpty())
        <div class="alert alert-success text-center mx-5" role="alert">
            Este emprendimiento no ofrece productos actualmente.
        </div>
    @else
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-lg-6 md-6 mb-5">
            <div class="d-flex align-items-center justify-content-center position-relative">            
                @if($producto->descuento > 0)
                    <span class="badge bg-danger position-absolute rounded-pill top-0 start-0 mt-3" style="margin-left: 4rem;">
                        {{ $producto->descuento }}% dcto
                    </span>
                @endif
                <img src="/imagenes/productos/{{$producto->imagen}}" class="image-product" alt="">
                <div class="box">        
                    <h4>{{$producto->nombre}}</h4>
                    <p>{{$producto->descripcion}}</p>
                    @if($producto->cantidad && $producto->medida)
                        <p>{{ $producto->cantidad }} {{ $producto->medida }}</p>
                    @endif
                    <p><strong>Precio: </strong>${{number_format($producto->valor_final)}}</p>
                   
                    @if($producto->stock > 0)
                        @can('agregarCarrito')
                        <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro('producto', {{$producto->id }})">
                            <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                        </button>
                        @endcan


                        @if ($producto->stock <= 10)
                            @can('editarProducto')
                                <p class="text-warning"><strong>¡Quedan {{ $producto->stock }} unidades disponibles!</strong></p>
                            @endcan                    
                        @endif
                    @else
                        <p class="text-danger"><strong>No hay stock disponible.</strong></p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


    <h3 class="fw-semibold mt-3 mb-4 text-center">SERVICIOS</h3>
    @if($servicios->isEmpty())
        <div class="alert alert-success text-center mx-5" role="alert">
            Este emprendimiento no ofrece servicios actualmente.
        </div>
    @else
    <div class="row">
        @foreach($servicios as $servicio)
        <div class="col-lg-6 md-6 mb-5">
            <div class="d-flex align-items-center justify-content-center position-relative">
                @if($servicio->descuento > 0)
                    <span class="badge bg-danger position-absolute rounded-pill top-0 start-0 mt-3" style="margin-left: 4rem;">
                        {{ $servicio->descuento }}% dcto
                    </span>
                @endif
                <img src="/imagenes/servicios/{{$servicio->imagen}}" class="image-product" alt="">
                <div class="box">
                    <h4>{{$servicio->nombre}}</h4>
                    <p>{{$servicio->descripcion}}</p>
                    <p><strong>Precio: </strong>${{number_format($servicio->valor_final)}}</p>
                    @can('agregarCarrito')
                    <button type="button" class="btn btn-success mt-2" wire:click="agregarCarro('servicio', {{ $servicio->id }})">
                        <i class="fas fa-cart-plus me-1"></i> Agregar al Carrito
                    </button>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>