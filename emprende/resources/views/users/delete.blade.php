@extends('plantillas.plantilla')
@section('titulo', 'Ofertas')
@section('content')
<h2 class="text-center my-4">Desea eliminar el Usuario <br> {{$usuarioEliminar->name}}</h2>
<div class="container d-flex justify-content-center">
<form action="/users/{{$usuarioEliminar->id}}" method="POST">
    @csrf
    @method('delete')
    <div class="text-center mb-5">
        <button type="submit" class="btn btn-confirmar mt-3 mb-5">Confirmar</button>
    </div>
</form>
</div>
@endsection