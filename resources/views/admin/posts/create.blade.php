@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.posts.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese el nombre de la categoría" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" placeholder="Ingrese el slug de la categoría" value="{{ old('slug') }}" readonly>
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                    <label class="mr-2">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : '' }}>
                        {{ $tag->name }}
                    </label>
                @endforeach
                @error('tags')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <label>
                    <input type="radio" name="status" value="0" {{ old('status', 0) == 0 ? 'checked' : '' }}>
                    Borrador
                </label>
                <label>
                    <input type="radio" name="status" value="1" {{ old('status') == 1 ? 'checked' : '' }}>
                    Publicado
                </label>
                @error('status')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>		
            
            <div id="file" class="form-group">
                <label for="image">Imagen:</label>
                <img id="picture" src="{{ asset('XD.jpg') }}" alt="">
                <input type="file" name="image" id="image" class="form-control-file">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>  

            
            <div class="form-group">
                <label for="extract">Extracto:</label>
                <textarea name="extract" id="extract" class="form-control">{{ old('extract') }}</textarea>
                @error('extract')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="body">Cuerpo del post:</label>
                <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                @error('body')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crear post</button>
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