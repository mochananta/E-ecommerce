<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminAddCustomerComponent extends Component
{
   // use WithFileUploads;
   public $user_id;
   public $name;
   public $email;
   // public $image;
   public $password;
   public $utype;
   // public $newimage;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'utype' => 'required'
        ]);
    }

    public function storeUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'utype' => 'required'
        ]);
        $users = new User();
        $users->name = $this->name;
        $users->email = $this->email;
        $users->password = bcrypt($this->password);
        // $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        // $this->image->storeAs('categories', $imageName);
        // $users->image = $imageName;
        $users->utype = $this->utype;
        $users->save();
        session()->flash('message', 'Customer has been created succesfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-customer-component');
    }
}
