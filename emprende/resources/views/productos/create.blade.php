@extends('layouts.navbar')
@section('titulo', 'Crear Producto')
@section('content')
<h2 class="text-center mb-5 fw-bold">CREAR PRODUCTO</h2>
<div class="container d-flex justify-content-center">
<form action="/productos" method="POST" enctype="multipart/form-data" class="form-editar">
    @csrf
    <div class="container mt-3">
        <div class="row">
        <div class="col-lg-6 mb-4">
        <label class="form-label fw-semibold">Nombre</label>
        <input type="text" placeholder="" class="form-control" name="nombre" required="">
    </div>
    <div class="col-lg-6 mb-4">
        <label class="form-label fw-semibold">Descripción</label>
        <input type="text" placeholder="" class="form-control" name="descripcion" required="">
    </div>
    <div class="col-lg-6 mb-4">
        <label class="form-label fw-semibold">Precio</label>
        <input type="number" placeholder="" class="form-control" name="precio" required="">
    </div>
    <div class="col-lg-6 mb-4">
        <label class="form-label fw-semibold">Stock</label>
        <input type="number" placeholder="" class="form-control" name="stock" required="">
    </div>
    <div class="col-lg-6 mb-4">
        <label class="form-label fw-semibold">Categoria</label>
        <input type="text" placeholder="" class="form-control" name="categoria" required="">
    </div>
    <div class="col-lg-6 mb-4">
        <label for="vendedor_id" class="form-label fw-semibold">Emprendimiento</label>
        <select class="form-control" name="vendedor_id" required>
            <option value="" disabled selected>Seleccione su emprendimiento</option>
            @foreach($vendedores as $vendedor)
                <option value="{{ $vendedor->id }}">{{ $vendedor->nom_emprendimiento }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label fw-semibold">Imagen</label>
        <input type="file" placeholder="" class="form-control" name="imagen" required="">
    </div>
        </div>
    </div>
    <livewire:create-product />
</form>
</div>
@endsection