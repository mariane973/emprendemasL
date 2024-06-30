@extends('layouts.navbar')
@section('titulo', 'Crear Pedido')
@section('content')
@can('accesoPedidos')
<section>
    <center>
        <h3 class="mb-4">Completa tu información</h3>
    </center>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(count($carritoitemsArray) > 0)
                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="{{ auth()->user()->name }}" class="form-control" required>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label for="telefono">Teléfono:</label>
                            <input type="number" id="telefono" name="telefono" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="direccion">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" required>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" id="ciudad" name="ciudad" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" required>
                    </div>

                    @foreach($carritoitemsArray as $item)
                        @if($item['tipo'] === 'producto')
                        <input type="hidden" name="carritoitemsArray[]" value="{{ json_encode($item) }}">
                            <input type="hidden" name="producto_id[]" value="{{ $item['id'] }}">
                            <input type="hidden" name="cantidad[]" value="{{ $item['cantidad'] }}">
                            <input type="hidden" name="precio_producto[]" value="{{ $item['valor_final'] }}">
                            <input type="hidden" name="id_vendedor[]" value="{{ $item['id_vendedor'] }}">
                            <div class="row">
                                <div class="form-group col-lg-12 mb-3">
                                    <label for="producto">Producto:</label>
                                    <input type="text" id="producto" name="producto" value="{{ $item['nombre'] }}" class="form-control" readonly>
                                </div>                               
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="cantidad_producto">Cantidad:</label>
                                    <input type="number" id="cantidad_producto" value="{{ $item['cantidad'] }}" name="cantidad_producto" class="form-control" readonly>
                                </div>
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="valorTotalProducto">Valor Producto:</label>
                                    <input type="number" id="valorTotalProducto" value="{{ $item['valor_final'] }}" name="valorTotalProducto" class="form-control" readonly>
                                </div>
                            </div>
                        @elseif($item['tipo'] === 'servicio')                        
                        <input type="hidden" name="carritoitemsArray[]" value="{{ json_encode($item) }}">
                        <input type="hidden" name="servicio_id[]" value="{{ $item['id'] }}">
                        <input type="hidden" name="cantidad[]" value="{{ $item['cantidad'] }}">
                        <input type="hidden" name="precio_servicio[]" value="{{ $item['valor_final'] }}">
                        <input type="hidden" name="id_vendedor[]" value="{{ $item['id_vendedor'] }}">
                            <div class="row">
                                <div class="form-group col-lg-12 mb-3">
                                    <label for="servicio">Servicio:</label>
                                    <input type="text" id="servicio" name="servicio" value="{{ $item['nombre'] }}" class="form-control" readonly>
                                </div>                               
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="cantidad_servicio">Cantidad:</label>
                                    <input type="number" id="cantidad_servicio" value="{{ $item['cantidad'] }}" name="cantidad_servicio" class="form-control" readonly>
                                </div>
                                <div class="form-group col-lg-6 mb-3">
                                    <label for="valorTotalServicio">Valor Servicio:</label>
                                    <input type="number" id="valorTotalServicio" value="{{ $item['valor_final'] }}" name="valorTotalServicio" class="form-control" readonly>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                    <hr>

                    <div class="form-group mb-3">
                        <label for="total">Total a pagar:</label>
                        <input type="text" id="total" name="total" value="{{ number_format($total) }}" class="form-control" readonly>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar Pedido</button>
                    </div>
                </form>
                @else
                    <div class="alert alert-warning">No hay productos ni servicios en el carrito.</div>
                @endif
            </div>
        </div>
    </div>
</section>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
        Acceso no Autorizado
    </div>
@endcan
@endsection