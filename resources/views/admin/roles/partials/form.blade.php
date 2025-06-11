<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

<div class="form-group">
    <label for="title">Nombre</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese el nombre del rol" value="{{ old('title', $role->name ?? '') }}">
    @error('title')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Permisos</p>
    @foreach ($permissions as $permission)
        <label class="mr-2">
            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                {{ (is_array(old('permissions', $role->permissions->pluck('id')->toArray() ?? [])) && in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray() ?? []))) ? 'checked' : '' }}>
            {{ $permission->description }}
        </label>
    @endforeach
    @error('permissions')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>




