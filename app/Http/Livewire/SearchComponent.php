<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchComponent extends Component
{
    public $user;
    public $notifications;
    public $unreadNoty;

    public $showNotifications;

    public function mount($user)
    {
        $this->user = $user;
        $this->notifications = $this->user->notifications;

        $this->unreadNoty = $this->user->unreadNotifications;

        $this->showNotifications = false;
    }

    public function toggle()
    {
        if($this->showNotifications) {
            $this->showNotifications = false;
        }else {
            $this->showNotifications = true;
            $this->user->notifications->markAsRead();
        }

        $this->unreadNoty = $this->user->unreadNotifications;
    }

    public function render()
    {
        return view('livewire.search-component');
    }
}
