<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $total, $nohp, $alamat;

    public function mount()
    {
       if(!Auth::user()) {
        return redirect()->route('login');

        $product = Product::where('user_id', Auth::user()->id)->where('status'. 0)->first();
       }
    }

    public function checkout()
    {
        dd('hai checkout');
        // $this->validate([
        //     'nohp' => 'required',
        //     'alamat' => 'required'
        // ]);

        // //Simpan noHp Alamat ke data Users
        // $user = User::where('id', Auth::user()->id)->first();
        // $user->nohp = $this->nohp;
        // $user->alamat = $this->alamat;
        // $user->update();
        
        // //update data orders
        // // $orders = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // // $orders->status =1;
        // // $orders->update();

        // // $this->emit('keranjang');

        session()->flash('message', "Sukses Checkout");

        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
