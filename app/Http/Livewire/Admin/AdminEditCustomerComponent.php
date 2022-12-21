<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
// use Livewire\WithFileUploads;

class AdminEditCustomerComponent extends Component
{
    // use WithFileUploads;
    public $user_id;
    public $name;
    public $email;
    // public $image;
    public $password;
    public $utype;
    // public $newimage;

    public function mount($user_id)
    {
        $users = User::find($user_id);
        $this->user_id = $users->id;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->password = $users->password;
        $this->utype = $users->utype;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'utype' => 'required'
        ]);
    }

    public function updateCustomer()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'utype' => 'required'

        ]);
        $users = User::find($this->user_id);
        $users->name = $this->name;
        $users->email = $this->email;
        $users->password = bcrypt($this->password);
        // if ($this->newimage) {
        //     // unlink('assets/imgs/customers/' . $users->newimage);
        //     $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
        //     $this->newimage->storeAs('customers', $imageName);
        //     $users->image = $imageName;
        // }
        $users->utype = $this->utype;
        $users->save();
        session()->flash('message', 'Customer has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-customer-component');
    }
}
