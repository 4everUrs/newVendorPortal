<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Shop;
use App\Models\VendorShop;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class Disposal extends Component
{
    public $items;
    public $viewItem = false;
    public $thumbnail;
    public $images;
    public $selected_id;
    public $details;

    public function render()
    {
        $this->items = VendorShop::all();
        $this->thumbnail;
        $this->images;
        if (!empty($this->selected_id)) {
            $this->details = VendorShop::find($this->selected_id);
            $this->images = Shop::with('images')->find($this->selected_id);
        }
        return view('livewire.disposal')->layout('welcome');
    }
    // public function mount()
    // {
    //     $this->images = Image::with('shop')->get();
    // }
    public function loadModal($id)
    {

        $temp = VendorShop::find($id);
        $this->thumbnail = $temp->thumbnail;

        // $this->images = Image::with('shop')->find($id)->get();

        // dd($this->images);
        $this->selected_id = $id;
        $this->viewItem = true;
    }
    public function addToCart()
    {
        $item = VendorShop::find($this->selected_id)->first();
        Cart::create([
            'user_id' => Auth::user()->id,
            'vendor_shop_id' => $this->selected_id,
            'qty' => '1',
            'subtotal' => $item->amount,
        ]);
        sweetalert()->addInfo('Add to Cart Successfully');
        $this->viewItem = false;
    }
}
