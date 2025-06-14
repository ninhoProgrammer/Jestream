@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{route('admin.categories.create')}}">Agregar categoría</a>
<h1>Lista de Categorías</h1>
@stop

@section('content')

	@if (session('info'))
		<div class="alert alert-success">
			<strong>{{ session('info') }}</strong>
		</div>
	@endif
	
<div class="card">
	<div class="card-header">
		
	</div>
	<div class="card-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th colspan="2"></th>
				</tr>
			</thead>
			<tbody>
			@foreach ($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td width="10px">
					<a 
					class="btn btn-primary btn-sm" 
					href="{{route('admin.categories.edit', $category)}}"
					>Editar</a>
					</td>
					<td width="10px">
					<form 
					action="{{route('admin.categories.destroy', $category)}}" 
					method="POST">
						@csrf
						@method('delete')
						<button type="submit" class="btn btn-danger btn-sm">
							Eliminar
						</button>
					</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop


