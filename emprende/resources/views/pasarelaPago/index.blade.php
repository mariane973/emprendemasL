@extends('layouts.navbar')
@section('titulo', 'Pasarela de pago')
@section('content')
<section>
    <center>
    <h3 class="mb-4">Completa tu información</h3>
    </center>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="">
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
                            <label for="direccion">Ciudad:</label>
                            <input type="text" id="direccion" name="ciudad" class="form-control" required>
                        </div>
                        
                    </div>

                    <div class="form-group  mb-5">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" required>
                        </div>

                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <input type="hidden" name="cantidad" value="{{ $cantidad }}">
                    <input type="hidden" name="precio" value="{{ $precio * $cantidad }}">
                    <input type="hidden" name="valor" value="{{ $precio * $cantidad }}">

                    <hr>
                    <h5 class="my-4">A cerca de tu pedido</h5>

                    <div class="row">
                    <div class="form-group col-lg-6 mb-3">
                        <label for="cantidad">Producto:</label>
                        <input type="text" id="cantidad" name="cantidad" value="{{ $producto -> nombre}}" class="form-control" disabled>
                    </div>

                    <div class="form-group col-lg-6 mb-3">
                        <label for="cantidad">Cantidad:</label>
                        <input type="text" id="cantidad" name="cantidad" value="{{ $cantidad }}" class="form-control" disabled>
                    </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="total">Total a pagar:</label>
                        <input type="text" id="total" name="total" value="{{ $precio * $cantidad }}" class="form-control" disabled>
                    </div>

                    <button type="submit" class="btn btn-primary">Pagar</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
