<div class="nav-container">
    <nav class="complete-nav">
        <a href="/home" class="my-logo">
            <i class="fas fa-rocket"></i>
            <span>MoonLight</span>
        </a>
        <div class="nav-center">
            <p>Persons</p>
            <p>Posts</p>
            <p>Pages</p>
            <div class="search">
                <input type="text" placeholder="Search ...">
                <div class="icon-container">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
        <div class="links">
            <a href=" {{route('user.index', ['user_id' => $user->id])}} " class="user">
                <i class="fas fa-user-circle"></i>
                <p> {{$user->name}} </p>
            </a>
            <a href="/">Home</a>
            <a href="#" style="padding: 4px 10px" wire:click.prevent = "toggle"> <i class="fas fa-bell"></i> </a>
            <span id="notifications"> {{ count($unreadNoty) }} </span>
            <form method="POST" action=" {{route('logout')}} ">
                @csrf
                <input type="submit" value="salir" />
            </form>
        </div>
        @if ($showNotifications)
        <div class="notifications">
            <h2>Notifications</h2>
            <hr>
            @foreach ($notifications as $notification)
                <div class="noty-container">
                    <div class="img-container">
                        <img src=" {{route('user.perfil', ['filename' => $notification->data['auth_user']['perfil']['image']])}} ">
                    </div>
                    <div class="text-info">
                        <p> 
                            <a href="{{route('user.index', ['user_id' => $notification->data['auth_user']['id'] ])}} "> 
                                {{ $notification->data['auth_user']['name'] }} 
                            </a> 
                            has made a comment in one of your publications 
                        </p>
                        <small> {{$notification->created_at->diffForHumans()}} </small>
                    </div>
                </div>
            @endforeach

        </div>
        @endif
        

    </nav>
</div>