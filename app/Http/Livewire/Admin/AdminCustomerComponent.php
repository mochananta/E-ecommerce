<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;
use App\Models\User;

class AdminCustomerComponent extends Component
{
    public $user_id;
    use WithPagination;

    public function render()
    {
        $users = User::orderBy('name', 'ASC')->paginate(5);
        return view('livewire.admin.admin-customer-component',['users' => $users]);
    }
}
