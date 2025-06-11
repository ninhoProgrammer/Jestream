<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RolesIndex extends Component
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
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
			->latest('id')
			->paginate(10);
        return view('livewire.admin.roles-index', compact('roles'));
    }
}
