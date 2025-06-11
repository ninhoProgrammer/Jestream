
 <div class="card">

     @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    
	<div class="card-header">
		<input wire:model="search" class="form-control" 
			placeholder="Ingrese el nombre de un post">
	</div>
	
	@if ($users->count())
	
	<div class="card-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
                    <th>Email</th>
					<th colspan="2"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
					<td with="10px">
						@can('admin.users.edit')
							<a 
							class="btn btn-primary btn-sm" 
							href="{{ route('admin.users.edit', $user) }}"
						>Editar</a>
						@endcan
						
					</td>
					<td with="10px">
						@can('admin.users.destroy')
							<form 
								action="{{ route('admin.users.destroy', $user) }}"
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
		{{ $users->links() }}
	</div>
	
	@else
		<div class="card-body">
			<strong>No hay ningún registro...</strong>
		</div>
	@endif
	
</div>
