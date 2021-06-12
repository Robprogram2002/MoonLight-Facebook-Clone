<div class="album-container">
    <div class="header">
        <div class="first-row">
            <div class="left">
                <i class="far fa-images"></i>
                <h1>Photos</h1>
            </div>
            <div class="right">
                <a href="#" wire:click.prevent = "showFormAlbum"><i class="fas fa-plus"></i> Create album</a>
            </div>
        </div>
        <div class="toggles">
            <a href="#" wire:click.prevent = "upadteAction('photos')">Your photos</a>
            <a href="#" wire:click.prevent = "upadteAction('albums')">Albums</a>
        </div>
    </div>
    @if ($action == 'photos' )
        <div class="main-photos">
            @foreach ($photos_posts as $photo)
            <div class="photo">
                    <img src=" {{route('post.file', ['filename' => $photo->image])}} " >
                    <div class="overlay">
                        <div class="text">
                            <p>Biography Photos</p>
                            <hr>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    @endif

    @if ($action == 'albums')
        <div class="main-albums">
            <div class="album-container first"  >
                <a wire:click = "showFormAlbum"><i class="fas fa-plus"></i> Create album {{$action}} </a>
            </div>
            @foreach ($albums as $album)
            <a class="album-container" wire:click = "albumDetail({{$album->id}})">
                <img src=" {{route('post.file', ['filename' => $album->image])}} " >
                <div class="overlay">
                    <div class="text">
                        <p> {{$album->name}} </p>
                        <hr>
                        <span>10 elements </span>
                    </div>
                </div>
            </a> 
            @endforeach
        </div>
    @endif

    @if ($action == 'detail')
        <div class="album-detail">
            <div class="header">
                <h2> {{$detail->name}} {{$form_photo}} </h2>
                <p> {{$detail->description !== null ? $detail->description : "This album doesn't have a description"}} </p>
                <hr>
                <span> 10 elements </span>
            </div>
            <div class="main-photos">
                <div class="photo add" wire:click.prevent = "showFormPhoto" >
                    <a wire:click.prevent = "showFormPhoto" ><i class="fas fa-plus"></i> Add photo</a>
                </div>
                @foreach ($photos_album as $photo)
                <div class="photo">
                    <img src=" {{route('post.file', ['filename' => $photo->image])}} " >
                    <div class="overlay">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
    
    @if ($form_album == 'verdadero')
        <div class="form-album-container">
            <form wire:submit.prevent = "saveAlbum">
                @csrf

                <div class="inputs-container">
                    <h2>New Album</h2>
                    <hr>
                    <label for="name">Album name :</label>
                    <input type="text" id="name" wire:model = "album_name">

                    <label for="description">Description : </label>
                    <textarea wire:model = 'album_description' id="description"></textarea>

                    <label for="image"> <i class="fas fa-upload"></i> Album cover</label>
                    <input type="file" wire:model = 'album_cover' id="image" accept="image/*">

                    <input type="submit" value="Save Album">
                </div>
                <div class="image">
                @if ($album_cover)
                    <img src="{{ $album_cover->temporaryUrl() }}" class="prev">
                @endif
                </div>
            </form>
        </div>
    @endif

    @if ($form_photo == 'verdadero')
        <div class="form-photo-container">
            <form wire:submit.prevent = "savePhoto">
                @csrf

                <div class="album-data">
                    <label for="">Album :</label>
                    <input type="text" value=" {{$detail->name}} ">

                    <label for="">Album Description:</label>
                    <input type="text" value=" {{$detail->description ? $detail->description : 'Add a description for this album'}} ">
                </div>
                <hr>
                <div class="main">
                    <div style="border-right: 1px solid #cccccc">
                        <label for="photo"> <i class="fas fa-upload"></i> Add Image</label>
                        <input type="file" wire:model = 'new_photo' id="photo" accept="image/*">

                        <p>Add a comment for this photo </p>
                        <textarea wire:model = 'photo_content'></textarea>

                        <input type="submit" value="Save Publication">
                    </div>
                    <div class="image">
                        @if ($new_photo)
                            <img src="{{ $new_photo->temporaryUrl() }}" class="prev">
                        @endif
                    </div>
                </div>
            </form>
        </div>
    @endif
</div>
