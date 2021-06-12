<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

use App\Follower;
use App\User;

class FriendsIndex extends Component
{
    public $user;
    public $action;

    public $seguidos = [];
    public $seguidores = [];

    public function mount($user)
    {
        $this->user = $user;
        $this->action = 'follows';

        $follows = Follower::where('follower', $user->id)->get();
        $followers = Follower::where('followed', $user->id)->get();

        if($follows !== null) {
            foreach ($follows as $key => $follow) {
                $person = User::where('id', $follow->followed)->first();
                array_push($this->seguidos, [$person->name, $person->perfil->image]);
            }
        }else {
            $this->seguidos = null;
        }

        if($followers !== null) {
            foreach ($followers as $key => $follower) {
                $person = User::where('id', $follower->follower)->first();
                array_push($this->seguidores, [$person->name, $person->perfil->image]);
            }
        }else {
            $this->seguidores = null;
        }


    }

    public function updateAction($action)
    {
        $this->action = $action;
    }

    public function render()
    {
        return view('livewire.users.friends-index');
    }
}
