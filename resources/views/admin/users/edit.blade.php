@extends('adminlte::page')

@section('title', 'Mario Blog - Posts')

@section('content_header')
<h1>Editar Usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.users.partials.form')
            
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Dependencia necesaria --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js"></script>

    {{-- Tu plugin --}}
    <script src="{{ asset('vendor/jq-sts-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            console.log("Inicializando stringToSlug...");
            $("#title").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection