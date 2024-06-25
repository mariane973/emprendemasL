@extends('layouts.navbar')
@section('titulo', 'Crear Emprendimiento')
@section('content')
@can('accesoVendedor')
<h2 class="text-center my-4">CREAR MI EMPRENDIMIENTO</h2>
<div class="container d-flex justify-content-center">
<form action="/emprendimientos" method="POST" enctype="multipart/form-data" class="form-editar">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" placeholder="" class="form-control" name="nom_emprendimiento" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <input type="text" placeholder="" class="form-control" name="descrip_emprendimiento" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input type="number" placeholder="" class="form-control" name="telefono" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Dirección</label>
        <input type="text" placeholder="" class="form-control" name="direccion" required="">
    </div>
    <div class="mb-3">
        <label class="form-label">Ciudad</label>
        <input type="text" placeholder="" class="form-control" name="ciudad" required="">
    </div>
    <div class="mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input type="file" placeholder="" class="form-control" name="logo" required="">
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

    <div class="text-center">
        <button type="submit" class="btn btn-success my-4">Crear</button>
    </div>
</form>
</div>
@else
    <div class="alert alert-success text-center mx-5" role="alert">
    Acceso no Autorizado
    </div>
@endcan
@endsection