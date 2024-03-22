@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
	<p>Welcome to this beautiful admin panel.</p>
	<div class="row">
		<div class="col-sm-6">
			<div class="card text-white bg-primary mb-3" >
				<div class="card-header">			
					<h1 class="card-title"> Total de Funcionarios</h1>
				</div>
				<div class="card-body">
					<h3>{{ $totalFuncionarios }}.</h3>
				</div>			

			</div>
		</div>
		<div class="col-sm-6">
			<div class="card text-white bg-primary mb-3" >
				<div class="card-header">			
					<h1 class="card-title"> Total de Dependencias</h1>
				</div>
				<div class="card-body">
					<h3> {{ $totalDependencias }}.</h3>
				</div>	
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="card text-white bg-success mb-3" >
				<div class="card-header">			
					<h1 class="card-title"> Total de Funcionarios Femeninos</h1>
				</div>
				<div class="card-body">
					<h3> {{ $femeninos }}.</h3>
				</div>			

			</div>
		</div>
		<div class="col-sm-6">
			<div class="card text-white bg-success mb-3" >
				<div class="card-header">			
					<h1 class="card-title"> Total de Funcionarios Masculinos</h1>
				</div>
				<div class="card-body">
					<h3> {{ $masculinos }}.</h3>
				</div>
			</div>	
		</div>
		
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="card text-white bg-secondary mb-3" >
				<div class="card-header">			
					<h1 class="card-title"> Total de Personal Superior</h1>
				</div>
				<div class="card-body">
					<h3> {{ $personalSupe }}.</h3>
				</div>			

			</div>
		</div>
		<div class="col-sm-6">
			<div class="card text-white bg-secondary mb-3" >
				<div class="card-header">			
					<h1 class="card-title"> Total de Personal Subalterno</h1>
				</div>
				<div class="card-body">
					<h3> {{ $personalSubal }}.</h3>
				</div>
			</div>	
		</div>
		
	</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop