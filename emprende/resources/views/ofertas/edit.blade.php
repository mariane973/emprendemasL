@extends('layouts.navbar')
@section('content')
<h2 class="text-center my-4">EDITAR PRODUCTO</h2>
<div class="container d-flex justify-content-center">
<form action="/ofertas/{{$ofertaEditar->id}}" method="POST" class="form-editar" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nombreProducto" class="form-label">Nombre</label>
        <input type="text" class="form-control" value="{{$ofertaEditar->nombre}}" name="nombreEdit">
    </div>
    <div class="mb-3">
        <label for="descripProducto" class="form-label">Descripción</label>
        <input type="text" class="form-control" value="{{$ofertaEditar->descripcion}}" name="descripEdit">
    </div>
    <div class="mb-3">
        <label for="precioProducto" class="form-label">Precio</label>
        <input type="number" class="form-control" value="{{$ofertaEditar->precio}}" name="precioEdit">
    </div>
    <div class="mb-3">
        <label for="descuentoProducto" class="form-label">descuento</label>
        <input type="number" class="form-control" value="{{$ofertaEditar->descuento}}" name="descuentoEdit">
    </div>
    <div class="mb-3">
        <label for="stockProducto" class="form-label">Stock</label>
        <input type="number" class="form-control" value="{{$ofertaEditar->stock}}" name="stockEdit">
    </div>
    <div class="mb-3">
        <label for="precioDescuentoProducto" class="form-label">precioDescuento</label>
        <input type="text" class="form-control" value="{{$ofertaEditar->precioDescuento}}" name="precioDescuentoEdit">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4">Editar</button>
    </div>
</form>
</div>
@endsection