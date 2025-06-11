<div class="card">

	 @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
	
	<div class="card-header">
		<input wire:model="search" class="form-control" 
			placeholder="Ingrese el nombre de un rol">
	</div>

	@if ($roles->count())

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
				@foreach ($roles as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td with="10px">
						@can('admin.roles.edit')
							<a 
								class="btn btn-primary btn-sm" 
								href="{{ route('admin.roles.edit', $role) }}"
							>Editar</a>
						@endcan
						
					</td>
					<td with="10px">
						@can('admin.roles.destroy')
							<form 
							action="{{ route('admin.roles.destroy', $role) }}"
							method="POST"
						>
							@csrf
							@method('DELETE')
							<button 
								type="submit" 
								class="btn btn-danger btn-sm"
							>Eliminar</button>
						</form>
						@endcan
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<div class="card-footer">
		{{ $roles->links() }}
	</div>
	
	@else
		<div class="card-body">
			<strong>No hay ningún registro...</strong>
		</div>
	@endif
	
</div>

