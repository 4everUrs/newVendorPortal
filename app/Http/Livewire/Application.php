<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;
use App\Models\Bidder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;



class Application extends Component
{
    public $post, $selected_id, $list_id;

    use WithFileUploads;
    public $name, $email, $phone, $bid_amount, $bid_proposal_file, $status = 'Pending', $address;
    public function render()
    {
        $this->post = Post::find($this->selected_id);
        return view('livewire.application')->layout('welcome');
    }
    public function mount(Request $request)
    {
        $this->selected_id = $request->id;
        $this->list_id = $request->list;
    }
    public function saveData(Request $request)
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'bid_amount' => 'required|integer',
            'address' => 'required|string',
            'status' => 'required|string',
        ]);
        if (!empty($this->bid_proposal_file)) {
            $validatedData['bid_proposal_file'] = $this->bid_proposal_file->store('bid_file', 'do');
        }
        $validatedData['post_id'] = $this->list_id;
        Bidder::create($validatedData);
        sweetalert()->addSuccess('Application sent successfully');
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->bid_amount = null;
        $this->bid_proposal_file = null;
    }
}
