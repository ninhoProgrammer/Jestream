@extends('adminlte::page')

@section('title', 'Mario Blog - Posts')

@section('content_header')
	@can('admin.roles.create')
		<a class="btn btn-secondary btn-sm float-right" 
		href="{{ route('admin.roles.create') }}">Nuevo rol</a>
	@endcan
	
	<h1>Listado de Roles</h1>
@stop

@section('content')
	@livewire('admin.roles-index')
@stop

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
	<script> console.log('Hi!'); </script>
@stop
