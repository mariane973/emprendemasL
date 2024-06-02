@extends('layouts.navbar')
@section('titulo', 'Crear Producto')
@section('content')
<h2 class="text-center my-4">CREAR PRODUCTO</h2>
<div class="container d-flex justify-content-center">
<form action="/productos" method="POST" enctype="multipart/form-data" class="form-editar">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" placeholder="" class="form-control" name="nombre" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input type="text" placeholder="" class="form-control" name="descripcion" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" placeholder="" class="form-control" name="precio" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Stock</label>
        <input type="number" placeholder="" class="form-control" name="stock" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <input type="text" placeholder="" class="form-control" name="categoria" required="">
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" placeholder="" class="form-control" name="imagen" required="">
    </div>
    <input type="hidden" name="vendedor_id" value="{{ Auth::user()->id }}">
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4">Crear</button>
    </div>
</form>
</div>
@endsection