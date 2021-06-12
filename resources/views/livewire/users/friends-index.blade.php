<div class="friends-container">
    <div class="toggle">
        <a href="#" wire:click.prevent = "updateAction('followers')"> 
             Followers  ({{$seguidores !== null ? count($seguidores) : '0'}})
        </a>
        <a href="#" wire:click.prevent = "updateAction('follows')"> 
            People follow  ({{$seguidos !== null ? count($seguidos) : '0'}})
        </a>
    </div>
    <div class="list">
        @if ($action == 'follows')
            @if ($seguidos !== null)
                @foreach ($seguidos as $seguido)
                <div class="person">
                    <div>
                        <img src=" {{route('user.perfil', ['filename' => $seguido[1]])}} ">
                    </div>
                    <div>
                        <a href="#"> {{$seguido[0]}}</a> <br>
                        <small>100 commond friends</small>
                    </div>
                </div>
                @endforeach
            @else
                <h3>Aun no estas siguiendo a nadie</h3>
            @endif
        @endif

        @if ($action == 'followers')
            @if ($seguidores !== null)
                @foreach ($seguidores as $seguidor)
                <div class="person">
                    <div>
                        <img src=" {{route('user.perfil', ['filename' => $seguidor[1]])}} ">
                    </div>
                    <div>
                        <a href="#"> {{$seguidor[0]}} </a>
                    </div>
                </div>
                @endforeach
            @else
                <h3>Aun no tienes seguidores</h3>
            @endif
        @endif
    </div>
</div>
