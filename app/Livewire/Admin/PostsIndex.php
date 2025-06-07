<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PostsIndex extends Component
{
	use WithPagination;
	
	protected $paginationTheme = "bootstrap";
	
	public $search = '';
	
	public function updatingSearch()
	{
		$this->resetPage();
	}
	
	public function render()
	{
		$posts = Post::where('title', 'like', '%' . $this->search . '%')
			->latest('id')
			->paginate(10);

		return view('livewire.admin.posts-index', compact('posts'));
	}
}