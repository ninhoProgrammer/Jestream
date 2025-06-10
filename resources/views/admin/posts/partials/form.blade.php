<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

<div class="form-group">
    <label for="title">Nombre</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese el nombre del post" value="{{ old('title', $post->title ?? '') }}">
    @error('title')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control" placeholder="Ingrese el slug del post" value="{{ old('slug', $post->slug ?? '') }}" readonly>
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="category_id">Categoría</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $id => $category)
            <option value="{{ $id }}" {{ old('category_id', $post->category_id ?? '') == $id ? 'selected' : '' }}>{{ $category }}</option>
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
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                {{ (is_array(old('tags', $post->tags->pluck('id')->toArray() ?? [])) && in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray() ?? []))) ? 'checked' : '' }}>
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
        <input type="radio" name="status" value="0" {{ old('status', $post->status ?? 0) == 0 ? 'checked' : '' }}>
        Borrador
    </label>
    <label>
        <input type="radio" name="status" value="1" {{ old('status', $post->status ?? 0) == 1 ? 'checked' : '' }}>
        Publicado
    </label>
    @error('status')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>		

<div id="file" class="form-group">
    <label for="image">Imagen:</label>
    <img id="picture" src="{{ $post->image ? Storage::url($post->image->url) : asset('XD.jpg') }}" alt="" style="max-width: 200px;">
    <input type="file" name="image" id="image" class="form-control-file">
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>  

<div class="form-group">
    <label for="extract">Extracto:</label>
    <textarea name="extract" id="extract" class="form-control">{{ old('extract', $post->extract ?? '') }}</textarea>
    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="body">Cuerpo del post:</label>
    <textarea name="body" id="body" class="form-control">{{ old('body', $post->body ?? '') }}</textarea>
    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
