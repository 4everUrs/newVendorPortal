<?php

namespace App\Http\Livewire;

use App\Models\Buyer;
use App\Models\Cart as ModelsCart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\VendorShop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Cart extends Component
{
    public $items, $products, $total;
    public $user_id, $qty = [];
    public $checkoutModal = false;
    public $checkoutItems;
    public $recipient, $phone, $email, $address, $status = 'Pending', $payment_method;
    public function render()
    {
        $this->subtotal();
        $this->getTotal();
        $this->total;
        $this->items = ModelsCart::with('VendorShop')->where('user_id', '=', $this->user_id)->get();
        return view('livewire.cart');
    }
    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->items = ModelsCart::with('VendorShop')->where('user_id', '=', $this->user_id)->get();
        foreach ($this->items as $key => $item) {
            $this->qty[$key] = $item->qty;
        }
    }
    public function subtotal()
    {
        $temps = ModelsCart::with('VendorShop')->get();
        foreach ($temps as $temp) {
            $temp->subtotal = $temp->VendorShop->amount * $temp->qty;
            $temp->save();
        }
    }
    public function addQty($id, $key)
    {

        $temp = ModelsCart::find($id);
        $temp->qty = $this->qty[$key];
        $temp->save();
        $this->getTotal();
    }
    public function removeItem($id)
    {
        $temp = ModelsCart::find($id)->delete();
        toastr()->addSuccess('Remove item Successfully');
    }
    public function getTotal()
    {
        $this->total = null;
        $temp = ModelsCart::all();
        foreach ($temp as $tmp) {
            $this->total += $tmp->subtotal;
        }
    }
    public function checkoutShowModal()
    {
        $this->checkoutModal = true;
        $this->checkoutItems = ModelsCart::with('VendorShop')->where('user_id', '=', $this->user_id)->get();
    }
    public function checkout()
    {
        Order::create([
            'user_id' => $this->user_id,
        ]);
        $order_id = Order::latest()->first();
        $validatedData = $this->validate([
            'recipient' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'address' => 'required|string',
            'status' => 'required|string',
            'user_id' => 'required|integer',
            'payment_method' => 'required|string',
        ]);
        $validatedData['user_id'] = $this->user_id;
        $validatedData['order_id'] = $order_id->id;
        Buyer::create($validatedData);
        $buyer_id = Buyer::latest()->first();
        $order_id->buyer_id = $buyer_id->id;
        $order_id->save();
        $temp = ModelsCart::with('VendorShop')->where('user_id', '=', $this->user_id)->get();

        $order = Order::latest('id')->first();
        foreach ($temp as $tmp) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_name' => $tmp->VendorShop->item_name,
                'qty' => $tmp->qty,
                'condition' => $tmp->VendorShop->condition,
                'description' => $tmp->VendorShop->description,
                'amount' => $tmp->VendorShop->amount,
                'thumbnail' => $tmp->VendorShop->thumbnail,
            ]);
        }
        toastr()->addSuccess('Checkout Successfully');
        $this->resetInput();
        ModelsCart::where('user_id', '=', $this->user_id)->delete();
        $this->checkoutModal = false;
    }
    public function resetInput()
    {
        $this->recipient = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->recipient = null;
        $this->payment_method = null;
    }
}
