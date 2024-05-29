@extends('layouts.navbar')

@section('titulo', 'Carrito de Compras')

@section('content')
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>

    <livewire:carritocompra />
@endsection