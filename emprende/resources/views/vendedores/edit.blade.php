@extends('layouts.navbar')
@section('titulo', 'Crear Emprendimiento')
@section('content')
<h2 class="text-center my-4">EDITAR MI EMPRENDIMIENTO</h2>
<div class="container d-flex justify-content-center">
<form action="/emprendimientos/{{$vendedorEditar->id}}" method="POST" enctype="multipart/form-data" class="form-editar">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input type="file" placeholder="" class="form-control" value="{{$vendedorEditar->logo}}" name="logoEdit">
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" placeholder="" class="form-control" value="{{$vendedorEditar->nom_emprendimiento}}" name="nom_emprendimientoEdit">
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input type="text" placeholder="" class="form-control" value="{{$vendedorEditar->descrip_emprendimiento}}" name="descrip_emprendimientoEdit">
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="number" placeholder="" class="form-control" value="{{$vendedorEditar->telefono}}" name="telefonoEdit">
    </div>
    <div class="mb-3">
        <label class="form-label">Dirección</label>
        <input type="text" placeholder="" class="form-control" value="{{$vendedorEditar->direccion}}" name="direccionEdit">
    </div>
    <div class="mb-3">
        <label class="form-label">Ciudad</label>
        <input type="text" placeholder="" class="form-control" value="{{$vendedorEditar->ciudad}}" name="ciudadEdit">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success my-4">Guardar Cambios</button>
    </div>
</form>
</div>
@endsection