@extends('adminlte::page')

@section('title', 'Mario Blog - Posts')

{{-- @section('content_header')
	<a class="btn btn-secondary btn-sm float-right" 
		href="{{ route('admin.user.create') }}">Nuevo post</a>
	<h1>Listado de Posts</h1>
@stop --}}

@section('content')
	@livewire('admin.users-index')
@stop

@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
	<script> console.log('Hi!'); </script>
@stop
