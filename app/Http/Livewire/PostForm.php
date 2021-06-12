<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Sentiment;
use App\Publication;
use App\Album;
use App\PhotoAlbum;

use Livewire\WithFileUploads;


class PostForm extends Component
{
    use WithFileUploads;


    public $user;
    public $sentiments;

    public $show_labels;
    public $show_sentiments;

    public $content;
    public $labelOne;
    public $labelTwo;
    public $labelThree;
    public $labelFour;
    public $image;
    public $gift;
    public $video;
    public $sentiment;

    public $user_album;

    public function mount($user)
    {   
        $this->user = $user;
        $this->show_labels = false;
        $this->show_sentiments = false;
        $this->sentiments = Sentiment::all();

        $this->user_album = Album::where([
            ['user_id',$this->user->id],
            ['name', 'Biography Pictures']
        ])->first();
    }

    public function showLabels()
    {
        $this->show_labels = true;
    }

    public function showSentiments()
    {
        $this->show_sentiments = true;
    }

    public function addSentiment($id)
    {
        $this->sentiment = $id;
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'content' => 'string|nullable',
            'image' => 'image|max:1024|nullable',
            'video' => 'nullable',
            'gift' => 'image|max:1024|nullable',
            'labelOne' => 'string|nullable',
            'labelTwo' => 'string|nullable',
            'labelThree' => 'string|nullable',
            'labelFour' => 'string|nullable',
            'sentiment' => 'numeric|nullable'
        ]);
    }

    public function savePost()
    {
        $this->validate([
            'content' => 'string|nullable',
            'image' => 'image|max:1024|nullable',
            'video' => 'file|nullable',
            'gift' => 'image|max:1024|nullable',
            'labelOne' => 'string|nullable',
            'labelTwo' => 'string|nullable',
            'labelThree' => 'string|nullable',
            'labelFour' => 'string|nullable',
            'sentiment' => 'numeric|nullable'
        ]);

        if($this->image !== null) {
            $image_path_name = time().$this->image->getClientOriginalName();
            $this->image->storeAs('publication', $image_path_name);
        }else {
            $image_path_name = null;
        }

        if($this->video !== null) {
            $video_path_name = time().$this->video->getClientOriginalName();
            $this->video->storeAs('publication', $video_path_name);
        }else {
            $video_path_name = null;
        }

        if($this->gift !== null) {
            $gift_path_name = time().$this->gift->getClientOriginalName();
            $this->gift->storeAs('publication', $gift_path_name);
        }else {
            $gift_path_name = null;
        }

        Publication::create([
            'content' => $this->content,
            'image' => $image_path_name,
            'video' => $video_path_name,
            'gift' => $gift_path_name,
            'user_id' => $this->user->id,
            'etiqueta1' => $this->labelOne,
            'etiqueta2' => $this->labelTwo,
            'etiqueta3' => $this->labelThree,
            'etiqueta4' => $this->labelFour,
            'sentiment_id' => $this->sentiment,
        ]);

        if($this->user_album !== null && $image_path_name !== null) {
            PhotoAlbum::create([
                'user_id' => $this->user->id,
                'album_id' => $this->user_album->id,
                'image' => $image_path_name,
            ]);
        }else {
            Album::create([
                'user_id' => $this->user->id,
                'name' => 'Biography Pictures',
                'image' => $image_path_name,
            ]);
            
            $this->user_album = Album::where([
                ['user_id', $this->user->id],
                ['name', 'Biography Pictures']
            ])->first();

            PhotoAlbum::create([
                'user_id' => $this->user->id,
                'album_id' => $this->user_album->id,
                'image' => $image_path_name,
            ]);
        }


        $this->content = '';
        $this->labelOne = '';
        $this->labelTwo = '';
        $this->labelThree = '';
        $this->labelFour = '';
        $this->image = null;
        $this->gift = null;
        $this->video = null;
        $this->sentiment = null;

        $this->emitUp('newPost');
        session()->flash('message', 'Post successfully created.');
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
