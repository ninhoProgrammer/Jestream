<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre de la categoría" value="{{ old('name') }}">
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
    <label for="color">Color:</label>
    <select name="color" id="color" class="form-control">
        @foreach($colors as $key => $value)
            <option value="{{ $key }}" {{ old('color', isset($tag) ? $tag->color : '') == $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @error('color')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>