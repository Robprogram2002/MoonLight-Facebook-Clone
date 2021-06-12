<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class InfoView extends Component
{
    public $user;
    public $user_info;

    public function mount($user, $user_info)
    {   
        $this->user_info = $user_info;
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.users.info-view');
    }
}
