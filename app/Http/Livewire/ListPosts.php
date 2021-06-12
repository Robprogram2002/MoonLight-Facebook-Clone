<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Publication;

class ListPosts extends Component
{
    public $user;
    public $posts;

    protected $listeners = ['postAdded' => 'updatePosts'];

    public function mount($user)
    {
        $this->user = $user;
        $this->posts = Publication::all();
    }
    
    public function updatePosts()
    {
        $this->posts = Publication::where('user_id',$this->user->id)->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.list-posts');
    }
}
