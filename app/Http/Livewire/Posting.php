<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posting extends Component
{
    public $posts;
    public $post_id;
    public function render()
    {
   
        $this->posts = Post::all();
        return view('livewire.posting')->layout('welcome');
    }
    public function apply($id)
    {

        $recieved_id = Post::find($id);
        $this->post_id = $recieved_id->recieved_id;
        return redirect()->route('view',['list'=> $id,'id'=> $this->post_id]);
    }
}
