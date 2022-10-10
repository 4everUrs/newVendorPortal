<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostRequirement;
use Illuminate\Http\Request;

class View extends Component
{
    public $post, $requirements = [];
    public $list_id;


    public function render(Request $request)
    {
        $this->post = Post::with('PostRequirements')->find($request->list);

        return view('livewire.view')->layout('welcome');
    }
    public function mount(Request $request)
    {
        $this->list_id = $request->id;
    }

    public function test($id)
    {
        return redirect()->route('apply', ['id' => $id, 'list' => $this->list_id]);
    }
}
