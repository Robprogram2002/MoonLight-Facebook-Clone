<main>
    @livewire('users.header', ['user' => $user, 'auth_user' => Auth::user()->id])
    <div class="menu-toggle">
        <a href="#" wire:click.prevent = "updateAction('info')">Information</a>
        <a href="#" wire:click.prevent = "updateAction('friends')">Friends</a>
        <a href="#" wire:click.prevent = "updateAction('photos')">Photos</a>
        <a href="#" wire:click.prevent = "updateAction('publications')">Publications</a>
        <a href="#" wire:click.prevent = "updateAction('pages')">Pages</a>
    </div>

    @switch($action)
        @case($action == 'info')
            @if ($user_info !== null)
                @livewire('users.info-view', ['user' => $user, 'user_info' => $user_info])
            @else
                @livewire('users.user-info', ['user' => $user])
            @endif
            @break
        @case($action == 'friends')
            @livewire('users.friends-index', ['user' => $user])
            @break
        @case($action == 'photos')
            @livewire('users.photos-index', ['user' => $user])
            @break
        @case($action == 'publications')
            @livewire('list-posts', ['user' => $user])
            @break
        @case($action == 'pages')
            @livewire('users.pages-index')
            @break
        @default
            
    @endswitch


</main>
