<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Publication;
use Livewire\WithFileUploads;
use App\Album;
use App\PhotoAlbum;

class PhotosIndex extends Component
{
    use WithFileUploads;

    public $user;
    public $photos_posts;
    public $action;
    public $albums;
    public $detail;
    public $photos_album;

    public $form_album;
    public $form_photo;
    public $album_name;
    public $album_description;
    public $album_cover;

    public $new_photo;
    public $photo_content;

    public function mount($user)
    {
        $this->user = $user;
        $this->photos_posts = Publication::where([
            ['user_id',$user->id],
            ['image', '!=', null],
        ])->get();
        $this->action = 'photos';
        $this->albums = Album::where('user_id', $user->id)->get();

        $this->form_album = 'falso';
        $this->form_photo = 'falso';
    }


    public function upadteAction($action)
    {
        $this->action = $action;
    }

    public function showFormAlbum()
    {   
        if($this->form_album == 'verdadero') {
            $this->form_album = 'falso';
        }else {
            $this->form_album = 'verdadero';
        }
    }

    public function showFormPhoto()
    {
        if($this->form_photo == 'verdadero') {
            $this->form_photo = 'falso';
        }else {
            $this->form_photo = 'verdadero';
        }
    }

    public function albumDetail($id)
    {
        $this->detail = Album::where('id',$id)->first();
        $this->action = 'detail';
        $this->photos_album = $this->detail->photos;
    }

    public function saveAlbum()
    {
        $this->validate([
            'album_name' => 'required|string|min:5',
            'album_description' => 'string|min:8|nullable',
            'album_cover' => 'required|image|max:1020'
        ]);

        $image_path_name = time().$this->album_cover->getClientOriginalName();
        $this->album_cover->storeAs('publication', $image_path_name);

        Album::create([
            'user_id' => $this->user->id,
            'name' => $this->album_name,
            'description' => $this->album_description,
            'image' => $image_path_name
        ]);

        Publication::create([
            'user_id' => $this->user->id,
            'image' => $image_path_name,
            'content' => $this->album_description,
            //note => create a new album
        ]);

        $current_album = Album::where([
            ['user_id', $this->user->id],
            ['name', $this->album_name],
        ])->first();

        PhotoAlbum::create([
            'user_id' => $this->user->id,
            'album_id' => $current_album->id,
            'image' => $image_path_name,
            'description' => $this->album_description,
        ]);

        $this->album_name = '';
        $this->album_cover = null;
        $this->album_description = '';

        $this->albums = Album::where('user_id', $this->user->id)->get();

        $this->showFormAlbum();
    }

    public function savePhoto()
    {
        $this->validate([
            'new_photo' => 'required|image|max:1020',
            'photo_content' => 'string|min:5|nullable',
        ]);
        
        $image_path_name = time().$this->new_photo->getClientOriginalName();
        $this->new_photo->storeAs('publication', $image_path_name);
        
        PhotoAlbum::create([
            'user_id' => $this->user->id,
            'album_id' => $this->detail->id,
            'image' => $image_path_name,
            'description' => $this->photo_content,
        ]);

        Publication::create([
            'user_id' => $this->user->id,
            'image' => $image_path_name,
            'content' => $this->photo_content,
            //note => add a photo to the {{album name}}
        ]);
        
        $this->new_photo = null;
        $this->photo_content = '';


        $this->photos_album = $this->detail->photos;

        $this->showFormPhoto();
    }

    public function render()
    {
        return view('livewire.users.photos-index');
    }
}
