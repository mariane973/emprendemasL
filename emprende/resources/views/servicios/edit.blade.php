@extends('layouts.navbar')
@section('content')
<h2 class="text-center my-4">EDITAR PRODUCTO</h2>
<div class="container d-flex justify-content-center">
<form action="/servicios/{{$serviciosEditar->id}}" method="POST" class="form-editar" enctype="multipart/form-data" class="form-editar">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nombreProducto" class="form-label">Nombre</label>
        <input type="text" class="form-control" value="{{$serviciosEditar->nombre}}" name="nombreEdit">
    </div>
    <div class="mb-3">
        <label for="descripProducto" class="form-label">Descripción</label>
        <input type="text" class="form-control" value="{{$serviciosEditar->descripcion}}" name="descripEdit">
    </div>
    <div class="mb-3">
        <label for="precioProducto" class="form-label">Precio</label>
        <input type="number" class="form-control" value="{{$serviciosEditar->precio}}" name="precioEdit">
    </div>
    <div class="mb-3">
        <label for="categoriaProducto" class="form-label">Categoria</label>
        <input type="text" class="form-control" value="{{$serviciosEditar->categoria}}" name="categoriaEdit">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4">Editar</button>
    </div>
</form>
</div>
@endsection