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
    <div class="mb-3">
        <label for="vendedor_id" class="form-label">Emprendimiento</label>
        <select class="form-control" name="vendedor_id" required>
            <option value="" disabled selected>Seleccione su emprendimiento</option>
            @foreach($vendedores as $vendedor)
                <option value="{{ $vendedor->id }}">{{ $vendedor->nom_emprendimiento }}</option>
            @endforeach
        </select>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4">Crear</button>
    </div>
</form>
</div>
@endsection