@extends('adminlte::page')

@section('title', '')

@section('content_header')
  <h1>Capital</h1>
@stop
@section('content')
<div class="row">
	<div class="col-sm-6">
		<div class="card text-white bg-primary mb-3" >
			<div class="card-header">			
				<h1 class="card-title"> Total de Funcionarios Capital</h1>
			</div>
			<div class="card-body">
				<h3>{{ $totalFuncCapital }}.</h3>
			</div>			

		</div>
	</div>
	<div class="col-sm-6">
		<div class="card text-white bg-primary mb-3" >
			<div class="card-header">			
				<h1 class="card-title"> Total de Dependencias Capital</h1>
			</div>
			<div class="card-body">
				<h3> {{ $totalDepenCapital }}.</h3>
			</div>	
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="card text-white bg-success mb-3" >
			<div class="card-header">			
				<h1 class="card-title"> Total de Funcionarios Sexo Masculino Capital</h1>
			</div>
			<div class="card-body">
				<h3>{{ $total_masc_capital }}.</h3>
			</div>			

		</div>
	</div>
	<div class="col-sm-6">
		<div class="card text-white bg-success mb-3" >
			<div class="card-header">			
				<h1 class="card-title"> Total de Funcionarios Sexo Femenino Capital</h1>
			</div>
			<div class="card-body">
				<h3> {{ $total_fem_capital }}.</h3>
			</div>	
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="card text-white bg-secondary mb-3" >
			<div class="card-header">			
				<h1 class="card-title"> Total de Personal Superior en Capital</h1>
			</div>
			<div class="card-body">
				<h3> {{ $tot_per_super_capital}}.</h3>
			</div>			

		</div>
	</div>
	<div class="col-sm-6">
		<div class="card text-white bg-secondary mb-3" >
			<div class="card-header">			
				<h1 class="card-title"> Total de Personal Subalterno en Capital</h1>
			</div>
			<div class="card-body">
				<h3> {{ $tot_per_subal_capital}}.</h3>
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
