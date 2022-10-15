<?php

namespace App\Http\Livewire;

use App\Models\MroRequest;
use Livewire\Component;
use App\Models\Post;

class Posting extends Component
{
    public $posts;
    public $workshops;
    public $post_id;
    public function render()
    {

        $this->posts = Post::all();
        $this->workshops = MroRequest::all();
        return view('livewire.posting')->layout('welcome');
    }
    public function workshopApply($id, $type)
    {

        return redirect()->route('workshop', ['type' => $type, 'id' => $id]);
    }
    public function apply($id)
    {
        $recieved_id = Post::find($id);
        $this->post_id = $recieved_id->recieved_id;
        return redirect()->route('view', ['list' => $id, 'id' => $this->post_id]);
    }
}
