<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\UserInformation;

class Main extends Component
{
    public $user;
    public $user_info;
    public $action;

    protected $listeners = ['newInfo' => 'updateUserInfo'];

    public function mount($user)
    {
        $this->user = $user;
        $this->user_info = UserInformation::where('user_id',$user->id)->first();
        $this->action = 'info';
    }

    public function updateUserInfo()
    {
        $this->user_info = UserInformation::where('user_id',$this->user->id)->first();   
    }

    public function updateAction($action)
    {
        $this->action = $action;
    }

    public function render()
    {
        return view('livewire.users.main');
    }
}
