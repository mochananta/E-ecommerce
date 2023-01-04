<?php

namespace App\Http\Livewire;

use App\Models\Checkout;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

// class CheckoutComponent extends Component
// {
//     public $ship_to_different;

//     public $firstname;
//     public $lastname;
//     public $email;
//     public $mobile;
//     public $line1;
//     public $line2;
//     public $city;
//     public $province;
//     public $country;
//     public $zipcode;

//     public $s_firstname;
//     public $s_lastname;
//     public $s_email;
//     public $s_mobile;
//     public $s_line1;
//     public $s_line2;
//     public $s_city;
//     public $s_province;
//     public $s_country;
//     public $s_zipcode;

    
//     public $paymentmode;
//     public $thankyou;

//     public function updated($fields)
//     {
//         $this->validateOnly($fields,[
//             'firstname' => 'required',
//             'lastname' => 'required',
//             'email' => 'required|email',
//             'mobile' => 'required|numeric',
//             'line1' => 'required',
//             'city' => 'required',
//             'province' => 'required',
//             'country' => 'required',
//             'zipcode' => 'required',
//             'paymentmode' => 'required'
//         ]);

//         if($this->ship_to_different)
//         {
//             $this->validateOnly($fields,[
//                 's_firstname' => 'required',
//                 's_lastname' => 'required',
//                 's_email' => 'required|email',
//                 's_mobile' => 'required|numeric',
//                 's_line1' => 'required',
//                 's_city' => 'required',
//                 's_province' => 'required',
//                 's_country' => 'required',
//                 's_zipcode' => 'required'
//             ]);
//         }
//     }

//     public function placeOrder()
//     {
//         $this->validate([
//             'firstname' => 'required',
//             'lastname' => 'required',
//             'email' => 'required|email',
//             'mobile' => 'required|numeric',
//             'line1' => 'required',
//             'city' => 'required',
//             'province' => 'required',
//             'country' => 'required',
//             'zipcode' => 'required',
//             'paymentmode' => 'required'
//         ]);

//         $order = new Order();
//         $order->user_id = Auth::user()->id;
//         $order->subtotal = session()->get('shop.checkout')['subtotal'];
//         $order->discount = session()->get('shop.checkout')['discount'];
//         $order->tax = session()->get('shop.checkout')['tax'];
//         $order->total = session()->get('shop.checkout')['total'];
//         $order->firstname = $this->firstname;
//         $order->lastname = $this->lastname;
//         $order->email = $this->email;
//         $order->mobile = $this->mobile;
//         $order->line1 = $this->line1;
//         $order->line2 = $this->line2;
//         $order->city = $this->city;
//         $order->province = $this->province;
//         $order->country = $this->country;
//         $order->zipcode = $this->zipcode;
//         $order->status = 'ordered';
//         $order->is_shipping_different = $this->ship_to_different ? 1:0;
//         $order->save();


//         foreach(Cart::instance('cart')->content() as $item)
//         {
//             $orderItem = new OrderItem();
//             $orderItem->product_id = $item->id;
//             $orderItem->order_id = $order->id;
//             $orderItem->price = $item->price;
//             $orderItem->quantity = $item->qty;
//             $orderItem->save();
//         }

//         if($this->ship_to_different)
//         {
//             $this->validate([
//                 's_firstname' => 'required',
//                 's_lastname' => 'required',
//                 's_email' => 'required|email',
//                 's_mobile' => 'required|numeric',
//                 's_line1' => 'required',
//                 's_city' => 'required',
//                 's_province' => 'required',
//                 's_country' => 'required',
//                 's_zipcode' => 'required'
//             ]);

//             $shipping = new Shipping();
//             $shipping->order_id = $order->id;
//             $shipping->firstname = $this->s_firstname;
//             $shipping->lastname = $this->s_lastname;
//             $shipping->email = $this->s_email;
//             $shipping->mobile = $this->s_mobile;
//             $shipping->line1 = $this->s_line1;
//             $shipping->line2 = $this->s_line2;
//             $shipping->city = $this->s_city;
//             $shipping->province = $this->s_province;
//             $shipping->country = $this->s_country;
//             $shipping->zipcode = $this->s_zipcode;
//             $shipping->save();
//         }

//         if($this->paymentmode == 'cod')
//         {
//             $transaction = new Transaction();
//             $transaction->user_id = Auth::user()->id;
//             $transaction->order_id = $order->id;
//             $transaction->mode = 'cod';
//             $transaction->status = 'pending';
//             $transaction->save();
//         }
//         $this->thankyou = 1;
//         Cart::instance('cart')->destroy();
//         session()->forget('shop.checkout');
//     }

//     public function verifyForCheckout()
//     {
//         if(!Auth::check())
//         {
//             return redirect()->route('login');
//         } 
//         else if($this->thankyou)
//         {
//             return redirect()->route('thankyou');
//         } 
//         else if(!session()->get('shop.checkout'))
//         {
//             return redirect()->route('shop.cart');
//         }
//     }

//     public function render()
//     {
//         $this->verifyForCheckout();
//         return view('livewire.checkout-component');
//     }
// }

class CheckoutComponent extends Component
{
    use WithFileUploads;
    public $total, $name, $email, $telepon, $alamat, $image;

    public function mount()
    {
       if(!Auth::user()) {
        return redirect()->route('login');

        $product = Product::where('user_id', Auth::user()->id)->where('status'. 0)->first();
       }
    }

    public function checkout()
    {
        // dd('hai checkout');
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'image' => 'required'
        ]);

        //Simpan noHp Alamat ke data Users
        $Checkout = new Checkout();
        $Checkout->name = $this->name;
        $Checkout->email = $this->email;
        $Checkout->telepon = $this->telepon;
        $Checkout->alamat = $this->alamat;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('checkouts', $imageName);
        $Checkout->image = $imageName;
        $Checkout->save();
        
        // //update data orders
        // // $orders = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // // $orders->status =1;
        // // $orders->update();

        // // $this->emit('keranjang');

        session()->flash('message', "Sukses Checkout");

        // return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}