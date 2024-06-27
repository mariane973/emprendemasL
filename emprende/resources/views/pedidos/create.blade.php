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

                    @if(isset($producto))
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <input type="hidden" name="cantidad_producto" value="{{ $cantidad }}">
                    <input type="hidden" name="precio_producto" value="{{ $producto->precio * $cantidad }}">
                    <input type="hidden" name="valor_total_producto" value="{{ $valorTotalProducto }}">
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="producto">Producto:</label>
                            <input type="text" id="producto" name="producto" value="{{ $producto->nombre }}" class="form-control" readonly>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label for="cantidad_producto">Cantidad:</label>
                            <input type="number" id="cantidad_producto" value="{{ $cantidad }}" name="cantidad_producto" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="valor_producto">Valor unidad:</label>
                            <input type="text" id="valor_producto" name="valor_producto" value="{{ number_format($producto->valor_final) }}" class="form-control" readonly>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label for="valor_total_producto">Valor total:</label>
                            <input type="text" id="valor_total_producto" name="valor_total_producto" value="{{ number_format($valorTotalProducto) }}" class="form-control" readonly>
                        </div>
                    </div>
                    @endif

                    @if(isset($servicio))
                    <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">
                    <input type="hidden" name="cantidad_servicio" value="{{ $cantidad }}">
                    <input type="hidden" name="precio_servicio" value="{{ $servicio->precio * $cantidad }}">
                    <input type="hidden" name="valor_total_servicio" value="{{ $valorTotalServicio }}">
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="servicio">Servicio:</label>
                            <input type="text" id="servicio" name="servicio" value="{{ $servicio->nombre }}" class="form-control" readonly>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label for="cantidad_servicio">Cantidad:</label>
                            <input type="number" id="cantidad_servicio" value="{{ $cantidad }}" name="cantidad_servicio" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="valor_servicio">Valor unidad:</label>
                            <input type="text" id="valor_servicio" name="valor_servicio" value="{{ number_format($servicio->valor_final) }}" class="form-control" readonly>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label for="valor_total_servicio">Valor total:</label>
                            <input type="text" id="valor_total_servicio" name="valor_total_servicio" value="{{ number_format($valorTotalServicio) }}" class="form-control" readonly>
                        </div>
                    </div>
                    @endif

                    <hr>

                    <!-- Total a pagar -->
                    <div class="form-group mb-3">
                        <label for="total">Total a pagar:</label>
                        <input type="text" id="total" name="total" value="{{ number_format($total) }}" class="form-control" readonly>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar Pedido</button>
                    </div>
                </form>
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
