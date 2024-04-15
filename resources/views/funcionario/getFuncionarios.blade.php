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
	{{--<x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#exampleModal"/>
	</button>--}}
		<table id="funcionarios" class="table table-striped" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th>Id</th>
					<th>Apellidos</th>
					<th>Nombres</th>
					<th>Dni</th>
					<th>Credencial</th>
					<th>Sexo</th>
					<th>Domicilio</th>
					<th>Jerarquia</th>
					<th>Dependencia</th>
					<th> Acciones </th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	

		<!-- Modal -->
		{{--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		</div> --}}

		@section('js')	
			<script src="https://code.jquery.com/jquery-3.7.1.js"> </script> 
			<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"> </script>
			<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"> </script>
			<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"> </script>

			<script>
				
				$( function() {
					
					// create a datatable
					console.log('hola');
					let ruta = "{{ route('funcionarios.index') }}";
					console.log(ruta);			
			
					$('#funcionarios').DataTable({
						  ajax: ruta,
							processing: true, 								
							serverSide: true,				                  
							"order": [['0', 'ASC']],
							columns: [
									//{data: 'DT_RowIndex', name: 'DT_RowIndex'},
									{ data: 'id', name: 'id'},
									{ data: 'apellidos', name: 'apellidos'},
									{ data: 'nombres', name: 'nombres'},
									{ data: 'dni', name: 'dni'},
									{ data: 'credencial', name: 'credencial'},
									{ data: 'sexo', name: 'sexo'},
									{ data: 'domicilio', name: 'domicilio'},
									{ data: 'jerarquia', name: 'jerarquia'},
									{ data: 'dependencia', name: 'dependencia'},
									{ data: 'action', name: 'action'},
							],
					});
				});				

		</script>
		@endsection

@endsection

	
