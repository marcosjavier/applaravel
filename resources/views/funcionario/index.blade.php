@extends('layout.plantillaBase')
	@section('css')
		<link href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" rel="stylesheet">
	@endsection

@section('contenido')
	<a href="/funcionarios/create" class="btn btn-info">NUEVO FUNCIONARIO</a>
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
	@section('js')
		<script src="https://code.jquery.com/jquery-3.7.1.js"> </script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"> </script>
		<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"> </script>
		<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"> </script>

		<script> 
			new DataTable ('#funcionarios');
		</script>
	@endsection
@endsection
