<?php

namespace App\Livewire\UserManagements;

use Livewire\Component;

use App\Models\User;

class UserManagementList extends Component
{
    public function render()
    {
        return view('livewire.user-managements.user-management-list', [
            'users' => User::paginate(15)
        ]);
    }
}
