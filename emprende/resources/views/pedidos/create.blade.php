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

                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <input type="hidden" name="cantidad" value="{{ $cantidad }}">
                    <input type="hidden" name="precio" value="{{ $producto->precio * $cantidad }}">
                    <input type="hidden" name="valor" value="{{ $producto->precio * $cantidad }}">
                    <input type="hidden" name="id_vendedor" value="{{ $id_vendedor }}">
                    <hr>
                    <h5 class="my-4">Acerca de tu pedido</h5>

                    <div class="row">
                    <div class="form-group col-lg-6 mb-3">
                        <label for="producto">Producto:</label>
                        <input type="text" id="producto" name="producto" value="{{ $producto->nombre }}" class="form-control" readonly>
                    </div>

                    <div class="form-group col-lg-6 mb-3">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" id="cantidad" value="{{ $cantidad }}" name="cantidad" class="form-control" readonly>
                    </div>
                    </div>
                    

                    <div class="form-group mb-3">
                    <label for="valor">Total a pagar:</label>
                    <input type="text" id="total" name="valor" value="{{ $precio * $cantidad }}" class="form-control" readonly>
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
