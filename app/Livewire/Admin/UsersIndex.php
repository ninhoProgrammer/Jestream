<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
	{
		$this->resetPage();
	}

    public function render()
    {
        $users = User::with('roles')->latest()->paginate(10);   
        return view('livewire.admin.users-index' , [
            'users' => $users,
        ]);
    }
}
