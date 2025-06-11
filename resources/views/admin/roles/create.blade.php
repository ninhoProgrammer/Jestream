@extends('adminlte::page')

@section('title', 'Mario Blog - Roles')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.roles.store') }}" method="POST" autocomplete="off">
            @csrf
            
            @include('admin.roles.partials.form')

            <button type="submit" class="btn btn-primary">Crear rol</button>
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

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){

            var file = event.target.files[0];

            var reader = new FileReader();

            reader.onload= (event)=>{

                document.getElementById("picture").setAttribute('src', event.target.result)

            };

            reader.readAsDataURL(file);

        }
    </script>
@endsection