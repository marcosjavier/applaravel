@extends('layout.vista_general')

@section('contenidoPrincipal')
    <h2>Contenido de la Vista 1</h2>
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    @php
        echo 'esto es un texto de Prueba';
    @endphp
@endsection

