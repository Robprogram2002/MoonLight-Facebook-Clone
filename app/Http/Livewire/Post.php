<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Comment;
use App\Like;
use App\Reaction;
use App\Notifications\commentPublication;

use Livewire\WithFileUploads;


class Post extends Component
{
    use WithFileUploads;

    public $publication;
    public $auth_user;
    public $comment_content;
    public $image;
    public $video;
    public $gif;

    public $isLike;
    public $likes;

    public $reaction_toggle;
    public $reaction;

    public $isReaction;
    public $smile_reaction;
    public $love_reaction;
    public $angry_reaction;

    public $comments;
    public $showComment;

    public function mount($publication, $auth_user)
    {
        $this->publication = $publication;
        $this->auth_user = $auth_user;

        $this->comments = Comment::where('publication_id', $publication->id)->get();

        $this->showComment = false;
        $this->reaction_toggle = false;

        $like = Like::where([
            ['user_id', $auth_user->id],
            ['publication_id', $publication->id],
        ])->first();

        if($like !== null) {
            $this->isLike = true;
        }else {
            $this->isLike = false;
        }

        $this->likes = Like::where('publication_id', $publication->id)->count();

        // *************************************

        $validate_reaction = Reaction::where([
            ['user_id', $auth_user->id],
            ['publication_id', $publication->id],
        ])->first();

        if($validate_reaction !== null) {
            $this->isReaction = true;
            $this->reaction = $validate_reaction->reaction;
        }else {
            $this->isReaction = false;
            $this->reaction = null;
        }

        $this->smile_reaction = Reaction::where([
            ['reaction', 'smile'],
            ['publication_id', $publication->id],
            ])->count();

        $this->love_reaction = Reaction::where([
            ['reaction', 'love'],
            ['publication_id', $publication->id],
            ])->count();

        $this->angry_reaction = Reaction::where([
            ['reaction', 'angry'],
            ['publication_id', $publication->id],
            ])->count();
    }

    public function saveComment()
    {
        $this->validate([
            'comment_content' => 'string|nullable|max:1000',
            'image' => 'image|max:1020|nullable',
            'video' => 'file|nullable'
        ]);

        if($this->image !== null) {
            $image_path_name = time().$this->image->getClientOriginalName();
            $this->image->storeAs('comment', $image_path_name);
        }else {
            $image_path_name = null;
        }

        if($this->video !== null) {
            $video_path_name = time().$this->video->getClientOriginalName();
            $this->video->storeAs('comment', $video_path_name);
        }else {
            $video_path_name = null;
        }
        

        Comment::create([
            'user_id' => $this->auth_user->id,
            'publication_id' => $this->publication->id,
            'content' => $this->comment_content,
            'image' => $image_path_name,
            'video' => $video_path_name,
            'label' => null,
        ]);

        $this->comment_content = '';
        $this->image = null;
        $this->video = null;

        $this->comments = Comment::where('publication_id', $this->publication->id)->get();

        $this->publication->user->notify(new commentPublication($this->publication, $this->auth_user));
    }

    public function updateComment()
    {
        if($this->showComment) {
            $this->showComment = false;
        }else {
            $this->showComment = true;
        }
    }

    public function addLike() 
    {
        if($this->isLike) {
            $like = Like::where([
                ['user_id', $this->auth_user->id],
                ['publication_id', $this->publication->id],
            ])->first();

            $like->delete();
            $this->isLike = false;
            $this->likes = Like::where('publication_id', $this->publication->id)->count();
        }else {
            Like::create([
                'user_id' => $this->auth_user->id,
                'publication_id' => $this->publication->id,
            ]);
    
            $this->isLike = true;
            $this->likes = Like::where('publication_id', $this->publication->id)->count();
        }

    }

    public function addReaction($action)
    {
        if($this->isReaction) {
            $validate_reaction = Reaction::where([
                ['user_id', $this->auth_user->id],
                ['publication_id', $this->publication->id],
            ])->first();
            
            if($validate_reaction->reaction == $action) {
                $validate_reaction->delete();
                $this->isReaction = false;
                $this->reaction = 'null';

            }else {
                $validate_reaction->reaction = $action;
                $validate_reaction->save();
                $this->reaction = $action;
            }

        }else {
            Reaction::create([
                'user_id' => $this->auth_user->id,
                'publication_id' => $this->publication->id,
                'reaction' => $action,
            ]);
    
            $this->isReaction = true;
            $this->reaction = $action;
        }

        $this->smile_reaction = Reaction::where([
            ['reaction', 'smile'],
            ['publication_id', $this->publication->id],
            ])->count();

        $this->love_reaction = Reaction::where([
            ['reaction', 'love'],
            ['publication_id', $this->publication->id],
            ])->count();

        $this->angry_reaction = Reaction::where([
            ['reaction', 'angry'],
            ['publication_id', $this->publication->id],
            ])->count();
    }

    public function showReactions()
    {   
        if($this->reaction_toggle) {
            $this->reaction_toggle = false;
        }else {
            $this->reaction_toggle = true;
        }
    }

    public function render()
    {
        return view('livewire.post');
    }
}
