<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

<div class="form-group">
    <label for="title">Nombre</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese el nombre del usuario" value="{{ old('title', $user->name ?? '') }}">
    @error('title')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Roles</p>
    @foreach ($roles as $role)
        <label class="mr-2">
            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                {{ (is_array(old('roles', $user->roles->pluck('id')->toArray() ?? [])) && in_array($role->id, old('roles', $user->roles->pluck('id')->toArray() ?? []))) ? 'checked' : '' }}>
            {{ $role->name }}
        </label>
    @endforeach
    @error('tags')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


