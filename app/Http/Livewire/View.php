<?php

namespace App\Http\Livewire;

use App\Models\MroRequest;
use Livewire\Component;
use App\Models\Post;
use App\Models\PostRequirement;
use Illuminate\Http\Request;

class View extends Component
{
    public $post, $requirements = [];
    public $list_id;
    public $workshop;


    public function render(Request $request)
    {
        if ($this->workshop != "workshop") {
            $this->post = Post::with('PostRequirements')->find($request->list);
        } elseif ($this->workshop == "workshop") {
            $this->post = MroRequest::find($request->id);
        }


        return view('livewire.view')->layout('welcome');
    }
    public function mount(Request $request)
    {
        $this->list_id = $request->id;
        $this->workshop = $request->list;
    }

    public function test($id, $type)
    {
        if ($type != 'workshop') {
            return redirect()->route('apply', ['id' => $id, 'list' => $this->list_id]);
        } else {
            return redirect()->route('apply', ['id' => $id, 'list' => $type]);
        }
    }
}
