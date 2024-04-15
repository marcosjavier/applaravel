@extends('adminlte::page')

@section('title', 'PERSONAL')

{{--@section('plugins.Datatables', true) --}}

@section('content_header')
  <h1>Funcionarios</h1>
@stop
@section('content')
	<!--<a href="/funcionarios/create" class="btn btn-info">NUEVO FUNCIONARIO</a> -->
	<!-- Button trigger modal -->
	{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Launch demo modal --}}
		{{-- Example button to open modal --}}
 		<x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#exampleModal"/>
	</button>
	<table id="funcionarios" class="table table-striped" style="width:100%">
		<thead class="bg-primary text-white">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Apellidos</th>
				<th scope="col">Nombres</th>
				<th scope="col">Dni</th>
				<th scope="col">Credencial</th>
				<th scope="col">Sexo</th>
				<th scope="col">Domicilio</th>
				<th scope="col">Jerarquia</th>
				<th scope="col">Dependencia</th>
				<th scope="col"> Acciones </th>
			</tr>
		</thead>
		<tbody>
			@foreach ($funcionarios as $funcionario )
				<tr>
					<td> {{ $funcionario->id }}</td>
					<td> {{ $funcionario->apellidos }}</td>
					<td> {{ $funcionario->nombres }}</td>
					<td> {{ $funcionario->dni }}</td>
					<td> {{ $funcionario->credencial }}</td>
					<td> {{ $funcionario->sexo }}</td>
					<td> {{ $funcionario->domicilio }}</td>
					<td> {{ !empty($funcionario->jerarquia) ? $funcionario->jerarquia->descripcion:' ' }}</td>
					<td> {{ !empty($funcionario->dependencia) ? $funcionario->dependencia->descripcion:' ' }}</td>
					<td>
						<form action="{{ route('funcionarios.destroy',$funcionario->id) }}" method="POST">
							<a href="/funcionarios/{{$funcionario->id}}/edit" class="btn btn-secondary">Editar</a>
								@csrf
								@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>          
					</td>        
				</tr>	
			@endforeach			
		</tbody>
	</table>
	

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

	@section('js')
		<script src="https://code.jquery.com/jquery-3.7.1.js"> </script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"> </script>
		<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"> </script>
		<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"> </script>

		<script>
			
			new DataTable('#funcionarios');
		</script>
	@endsection
@stop
