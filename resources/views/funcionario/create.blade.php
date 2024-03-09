@extends('layout.plantillaBase')

@section('contenido')
<h2>NUEVO FUNCIONARIO</h2>
<form action="/funcionarios" method="POST">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">APELLIDOS</label>
      <input type="text" class="form-control" id="apellidos" name="apellidos" tabindex="1">
      
    </div>
    <div class="mb-3">
      <label for="" class="form-label">NOMBRES</label>
      <input type="text" class="form-control" id="nombres" name="nombres" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">DNI</label>
        <input type="text" class="form-control" id="dni" name="dni" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">CREDENCIAL</label>
        <input type="text" class="form-control"  id="credencial" name="credencial" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sexo</label>
        <input type="text" class="form-control" id="sexo" name="sexo" tabindex="5">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Domicilio</label>
        <input type="text" class="form-control" id="domicilio" name="domicilio" tabindex="6">
    </div>
    <a href="/funcionarios" class="btn btn secondary" tabindex="7">Cancelar</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection