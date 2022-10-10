<?php

namespace App\Http\Livewire;

use App\Models\Buyer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\VendorShop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Orders extends Component
{
    public $orders;
    public $viewOrder = false;
    public $selected_id;
    public $orderDetails;
    public $orderItems;
    public $confirmed, $preparing, $shipping, $transit, $delivered;
    public function render()
    {

        $this->orders = Order::with('buyer')->where('user_id', '=', Auth::user()->id)->get();
        $this->orderDetails = Order::with('buyer', 'OrderItem')->where('id', '=', $this->selected_id)->get();
        return view('livewire.orders');
    }
    public function mount()
    {
        $temp = Buyer::where('user_id', '=', Auth::user()->id)->first();

        if ($temp->status == 'confirmed') {
            $this->confirmed = 'active';
        } elseif ($temp->status == 'preparing') {
            $this->confirmed = 'active';
            $this->preparing = 'active';
        } elseif ($temp->status == 'shipping') {
            $this->confirmed = 'active';
            $this->preparing = 'active';
            $this->shipping = 'active';
        } elseif ($temp->status == 'transit') {
            $this->confirmed = 'active';
            $this->preparing = 'active';
            $this->shipping = 'active';
            $this->transit = 'active';
        } elseif ($temp->status == 'delivered') {
            $this->confirmed = 'active';
            $this->preparing = 'active';
            $this->shipping = 'active';
            $this->transit = 'active';
            $this->delivered = 'active';
        }
    }
    public function showModal($id)
    {
        $this->selected_id = $id;
        $this->viewOrder = true;
    }
}
