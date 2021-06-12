<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Publication;

class PostsIndex extends Component
{
    public $user;
    public $posts;

    public function mount($user)
    {
        $this->user = $user;
        $this->posts = Publication::all()->where('user_id', $user->id);
    }

    public function render()
    {
        return view('livewire.users.posts-index');
    }
}
