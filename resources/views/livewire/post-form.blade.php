<div class="form-container">
    <form wire:submit.prevent = "savePost">
        @csrf
        <h3>Create new publication</h3>
        <div class="input-container">
            <i class="fas fa-user-circle"></i>
            <textarea placeholder="What are in you mind?, {{$user->name}} " wire:model = 'content' > </textarea>
        </div>
            <div class="files">
                <div class="file">
                    <input type="file" wire:model = 'image' id="image">
                    <label for="image"> <i class="fas fa-images"></i> Image</label>
                    @error('image') <span class="error"> {{$message}} </span> @enderror

                </div>
                <div class="file">
                    <input type="file" wire:model = 'video' id="video" accept="video/*">
                    <label for="video"> <i class="fas fa-video"></i> Video</label>
                    @error('video') <span class="error"> {{$message}} </span> @enderror

                </div>
                <div class="file">
                    <input type="file" wire:model = 'gift' id="gift">
                    <label for="gift"> <i class="fas fa-photo-video"></i> Gif</label>
                    @error('gift') <span class="error"> {{$message}} </span> @enderror
                </div>
            </div>
            <div class="labels">
                @if ($show_labels)
                    <input type="text" placeholder='Perfil name (Label one) ...' wire:model = labelOne>
                    <input type="text" placeholder='Perfil name (Label two) ...' wire:model = labelTwo>
                    <input type="text" placeholder='Perfil name (Label three) ...' wire:model = labelThree>
                    <input type="text" placeholder='Perfil name (Label four) ...' wire:model = labelFour>
                @else 
                <button wire:click.prevent = "showLabels">Add labels</button>
                @endif
            </div>
            <div class="sentiments">
                @if ($show_sentiments)
                    @foreach ($sentiments as $key => $sentiment)
                        <p wire:click.prevent = "addSentiment({{$sentiment->id}})"> <i class="{{$sentiment->icon}}" ></i> {{$sentiment->name}} </p>
                    @endforeach
                @else
                <button wire:click.prevent = "showSentiments">Add a Sentiment/Ativity</button>
                @endif

            </div>
        <hr>
        <input type="submit" value="Publicate" wire:click="$emit('postAdded')">
    </form>
</div>
