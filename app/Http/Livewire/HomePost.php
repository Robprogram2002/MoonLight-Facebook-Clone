<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomePost extends Component
{
    public $user;
    public $toggle;

    protected $listeners = ['postAdded' => 'showPostForm'];

    public function mount($user)
    {
        $this->user = $user;
        $this->toggle = false;
    }

    public function postAdded()
    {
        return $this->showPostForm();
    }

    public function showPostForm()
    {
        if($this->toggle){
            $this->toggle = false;
        }else {
            $this->toggle = true;
        }
    }

    public function render()
    {
        return view('livewire.home-post');
    }
}
