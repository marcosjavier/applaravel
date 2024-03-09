@extends('layout.plantillaBaseDependencia');

@section('contenido')
<a href="/funcionarios/create" class="btn btn-secondary">NUEVO DEPENDENCIA</a>
<table class="table">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Descripción</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($dependencias as $dependencia )
		<tr>
			<td> {{ $dependencia->id }}</td>
			<td> {{ $dependencia->descripcion }}</td>
			<td> {{ $dependencia->unidadRegional->descripcion}}</td>

		</tr>	
		@endforeach
		
	</tbody>
</table>
@endsection