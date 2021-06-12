<div>
    <div class="header">
        <div class="portada">
            @if ($img_portada !== null)
            <img src=" {{route('user.portada', ['filename' => $img_portada->image])}} " >
            @endif
            <div class="add" wire:click="imgPortada">
                <i class="fas fa-camera"></i>
                <a> {{$img_portada ? 'Update portada photo' : 'Add a portada photo'}} </a>
            </div>

            <div class="perfil" wire:click="imgPerfil">
            @if ($img_perfil !== null)
                <img src=" {{route('user.perfil', ['filename' => $img_perfil->image])}} ">
            @else
                <img src=" {{asset('storage/images/blank-profile-picture-973460_640.png')}} " >
            @endif
            <div class="overlay">
                <div class="image">
                    <i class="fas fa-camera"></i><br>
                    <a href="#"> {{$img_perfil ? 'Update photo' : 'Add perfil photo'}} </a>
                </div>
            </div>
            </div>
            <div class="name">
                <h2> {{$user->name}} </h2>
            </div>
            @if (Auth::user()->id !== $user->id)
                @if ($isFollow)
                <div class="follow">
                    <span><i class="fas fa-check"></i> Following</span>
                </div>
                @else
                <div class="follow">
                    <a href="#" wire:click.prevent = "addFollow"><i class="fas fa-user-plus"></i> Follow</a>
                </div>
                @endif
            @endif
        </div>
    </div>
    @if($action == 'perfil')
    <div class="form-container">
        <form wire:submit = 'savePerfil'>
            @csrf
            <h3>Add a new perfil photo</h3>
            <input type="file" wire:model = 'perfil' id="file">
            <label for="file"><i class="fas fa-upload"></i> Choose a file</label>
            @if ($perfil)
                <img src="{{ $perfil->temporaryUrl() }}" class="prev">
                <hr>
            @endif
            <input type="submit" value="Save">
        </form>
    </div>
    @endif

    @if($action == 'portada')
    <div class="form-container">
        <form wire:submit = 'savePortada'>
            @csrf
            <h3>Add a new portada photo</h3>
            <input type="file" wire:model = 'portada' id="file">
            <label for="file"><i class="fas fa-upload"></i> Choose a file</label>
            @if ($portada)
                <img src="{{ $portada->temporaryUrl() }}" class="prev">
                <hr>
            @endif
            <input type="submit" value="Save">
        </form>
    </div>
    @endif
</div>

