<div class="post">
    <div class="header">
        <div class="left">
            <a href="{{route('user.index', ['user_id' => $publication->user->id])}}">
                <img src=" {{route('user.perfil', ['filename' => $publication->user->perfil->image])}} ">
            </a>
            <div class="text">
                <a href="{{route('user.index', ['user_id' => $publication->user->id])}}"> {{$publication->user->name}} </a>
                <p> {{$publication->created_at->diffForHumans()}} <i class="fas fa-globe-americas"></i> </p>
            </div>
        </div>
        <p> <i class="fas fa-ellipsis-h"></i> </p>
    </div>
    <div class="main">
        @if ($publication->content !== null)
            <p> {{$publication->content}} </p>    
        @endif
        @if ($publication->image !== null) 
            <a href=""{{route('user.index', ['user_id' => $publication->user->id])}}"">
                <img src=" {{route('post.file', ['filename' => $publication->image])}} " >
            </a>
        @endif
        @if ($publication->gift !== null) 
            <img src=" {{route('post.file', ['filename' => $publication->gift])}} " >
        @endif
        @if ($publication->video !== null) 
            <video src=" {{route('post.file', ['filename' => $publication->video])}} " controls width="100%" height="100%"></video>
        @endif
    </div>
    <div class="info">
        <div class="reactions">
                <div>
                    <i class=" {{$smile_reaction !== null ? "far fa-laugh-squint" : ""}} "></i>
                    {{$smile_reaction !== null ? $smile_reaction : ""}}
                </div>
                <div>
                    <i class=" {{$love_reaction !== null ? "far fa-grin-hearts" : ""}} "></i>
                    {{$love_reaction !== null ? $love_reaction : ""}}
                </div>
                <div>
                    <i class=" {{$angry_reaction !== null ? "far fa-angry" : ""}} "></i>
                    {{$angry_reaction !== null ? $angry_reaction : ""}}
                </div>
            </div> 
        <div class="views"> {{count($comments)}} comments </div>
    </div>
    <hr>
    <div class="buttons">
        @if ($isLike)
        <button class="like" wire:click.prevent = "addLike">
            <i class="far fa-thumbs-down"></i> Dislike ({{$likes}})
        </button>
        @else
        <button wire:click.prevent = "addLike">
            <i class="far fa-thumbs-up"></i> Like  ({{$likes}})
        </button>
        @endif
        <button wire:click.prevent = "updateComment">
            <i class="far fa-comments"></i> Comment  
        </button>
        <button wire:click.prevent = "showReactions">
            <i class="far fa-laugh-squint"></i> Reaction
        </button>
        @if ($reaction_toggle)
        <div class="react-btns">
            <button wire:click.prevent = "addReaction('smile')" class="{{$reaction == 'smile' ? 'active' : ''}} ">
                <i class="far fa-laugh-squint"></i>
                <small>Me divierte</small>
            </button>
            <button wire:click.prevent = "addReaction('love')" class="{{$reaction == 'love' ? 'active' : ''}} ">
                <i class="far fa-grin-hearts"></i>
                <small>Me enamora</small>
            </button>
            <button wire:click.prevent = "addReaction('angry')" class="{{$reaction == 'angry' ? 'active' : ''}} ">
                <i class="far fa-angry"></i>
                <small>Me enoja</small>
            </button>
        </div>
        @endif
        <button><i class="fas fa-share-alt"></i>Share</button>
    </div>
    <hr>
    @if ($showComment)
        <div class="comments">
            <div class="comment-list">
                @foreach ($comments as $comment)
                    <div class="comment">
                        <div class="left">
                            <a href="{{route('user.index', ['user_id' => $comment->user->id])}}">
                                <img src=" {{route('user.perfil', ['filename' => $comment->user->perfil->image])}} ">
                            </a>
                        </div>
                        <div class="main">
                            <div class="content">
                                @if ($comment->content !== null)
                                    <p> 
                                        <a href="{{route('user.index', ['user_id' => $comment->user->id])}}">
                                            {{$comment->user->name}}
                                        </a> 
                                        {{$comment->content}}
                                    </p> 
                                @endif
                                @if ($comment->image !== null) 
                                    <div class="file-container">
                                        <img src=" {{route('comment.file', ['filename' => $comment->image])}} " >
                                    </div>
                                @endif
                                @if ($comment->video !== null) 
                                <div  class="file-container">
                                    <video src=" {{route('comment.file', ['filename' => $comment->video])}} " controls width="100%" height="100%"></video>
                                </div>
                                @endif
                            </div>
                            <div class="info">
                                <span>Me gusta</span>
                                <span>Respoonder</span>
                                <small> {{$comment->created_at->diffForHumans()}} </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="comment-form">
                <div class="image">
                    <img src=" {{route('user.perfil', ['filename' => $auth_user->perfil->image])}} ">
                </div>
                <div class="input-container">
                    <textarea  
                        wire:model = 'comment_content' 
                        placeholder="Write a commnet ..."
                        wire:keydown.enter="saveComment"
                        wrap="hard"
                        cols="10"
                        rows="30"
                        >
                    </textarea>


                    <label for="image"> <i class="fas fa-camera"></i> </label>
                    <input type="file" id="image" wire:model = 'image' accept="image/*" wire:keydown.enter="saveComment">

                    <label for="video"> <i class="fas fa-video"></i> </label>
                    <input type="file" id="video" wire:model = 'video' accept="video/*" wire:keydown.enter="saveComment">

                    <label for="gif"> <i class="fas fa-gift"></i> </label>
                    <input type="file" id="gif" wire:model = 'gif' accept="gif/*" wire:keydown.enter="saveComment">
                </div>
            </div>
        </div>
    @endif

</div>