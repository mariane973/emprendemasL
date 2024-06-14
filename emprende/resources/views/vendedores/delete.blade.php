@extends('layouts.navbar')
@section('titulo', 'Crear Emprendimiento')
@section('content')
<h2 class="text-center my-4">Desea eliminar el Emprendimiento <br> {{$vendedorEliminar->nom_emprendimiento}}</h2>
<div class="container d-flex justify-content-center">
<form action="/emprendimientos/{{$vendedorEliminar->id}}" method="POST">
    @csrf
    @method('delete')
    <div class="text-center mb-5">
        <button type="submit" class="btn btn-danger mt-3 mb-5">Confirmar</button>
    </div>
</form>
</div>
@endsection