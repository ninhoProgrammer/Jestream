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
	
	@if ($posts->count())
	
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
				@foreach ($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td with="10px">
						@can('admin.posts.edit')
							<a 
								class="btn btn-primary btn-sm" 
								href="{{ route('admin.posts.edit', $post) }}"
							>Editar</a>
						@endcan
						
					</td>
					<td with="10px">
						@can('admin.posts.destroy')
							<form 
							action="{{ route('admin.posts.destroy', $post) }}"
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
		{{ $posts->links() }}
	</div>
	
	@else
		<div class="card-body">
			<strong>No hay ningún registro...</strong>
		</div>
	@endif
	
</div>
