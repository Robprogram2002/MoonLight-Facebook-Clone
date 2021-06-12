<?php

namespace App\Http\Livewire\Users;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Perfil;
use App\Portada;
use App\Publication;
use App\Album;
use App\PhotoAlbum;
use App\Follower;

class Header extends Component
{
    use WithFileUploads;
    
    public $user;
    public $auth_user;
    public $isFollow;

    public $perfil;
    public $portada;
    public $action;
    public $img_portada;
    public $img_perfil;

    public $profile_album;
    public $cover_album;

    public function mount($user, $auth_user)
    {
        $this->user = $user;
        $this->auth_user = $auth_user;
        $this->action = '';
        $this->img_portada = Portada::all()->where('user_id', $user->id)->first();
        $this->img_perfil = Perfil::where('user_id', $this->user->id)->first();

        $this->profile_album = Album::where([
            ['user_id', $this->user->id],
            ['name', 'Profile Pictures']
        ])->first();

        $this->cover_album = Album::where([
            ['user_id', $this->user->id],
            ['name', 'Cover Pictures']
        ])->first();

        $validate = Follower::where([
            ['follower', $this->auth_user],
            ['followed', $this->user->id]
        ])->first();

        if($validate !== null) {
            $this->isFollow = true;
        }else {
            $this->isFollow = false;
        }

    }

    public function imgPerfil()
    {
        $this->action = 'perfil';
    }

    public function imgPortada()
    {
        $this->action = 'portada';
    }

    public function updatedPortada()
    {
        $this->validate([
            'portada' => 'image|max:1024',
        ]);
    }

    public function updatedPerfil()
    {
        $this->validate([
            'perfil' => 'image|max:1024',
        ]);
    }

    public function savePortada()
    {
        $this->validate([
            'portada' => 'image|max:1024',
        ]);

        $image_path_name = time().$this->portada->getClientOriginalName();
        $this->portada->storeAs('portada', $image_path_name);
        $this->portada->storeAs('publication', $image_path_name);

        Portada::create([
            'user_id' => $this->user->id,
            'image' => $image_path_name
        ]);

        Publication::create([
            'user_id' => $this->user->id,
            'image' => $image_path_name,
            //nota => 'Actualizo su foto de portada'
        ]);

        if($this->cover_album !== null) {
            PhotoAlbum::create([
                'user_id' => $this->user->id,
                'album_id' => $this->cover_album->id,
                'image' => $image_path_name,
            ]);
        }else {
            Album::create([
                'user_id' => $this->user->id,
                'name' => 'Cover Pictures',
                'image' => $image_path_name,
            ]);
            
            $this->cover_album = Album::where([
                ['user_id', $this->user->id],
                ['name', 'Cover Pictures']
            ])->first();

            PhotoAlbum::create([
                'user_id' => $this->user->id,
                'album_id' => $this->cover_album->id,
                'image' => $image_path_name,
            ]);

        }

        $this->action = '';
        
    }

    public function savePerfil()
    {
        $this->validate([
            'perfil' => 'image|max:1024',
        ]);

        $image_path_name = time().$this->perfil->getClientOriginalName();
        $this->perfil->storeAs('perfile', $image_path_name);
        $this->perfil->storeAs('publication', $image_path_name);

        Perfil::create([
            'user_id' => $this->user->id,
            'image' => $image_path_name
        ]);
        
        Publication::create([
            'user_id' => $this->user->id,
            'image' => $image_path_name,
            //nota => 'Actualizo su foto de perfil'
        ]);
        
        if($this->profile_album !== null) {
            PhotoAlbum::create([
                'user_id' => $this->user->id,
                'album_id' => $this->profile_album->id,
                'image' => $image_path_name,
            ]);
        }else {
            Album::create([
                'user_id' => $this->user->id,
                'name' => 'Profile Pictures',
                'image' => $image_path_name,
            ]);
            
            $this->profile_album = Album::where([
                ['user_id', $this->user->id],
                ['name', 'Profile Pictures']
            ])->first();

            PhotoAlbum::create([
                'user_id' => $this->user->id,
                'album_id' => $this->profile_album->id,
                'image' => $image_path_name,
            ]);

        }

        $this->action = '';
    }

    public function addFollow()
    {
        Follower::create([
            'follower' => $this->auth_user,
            'followed' => $this->user->id,
        ]);

        $this->isFollow = true;
    }

    public function render()
    {
        return view('livewire.users.header');
    }
}
