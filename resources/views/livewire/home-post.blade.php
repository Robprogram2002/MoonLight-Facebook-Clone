<div class="create-post">
    @if (session()->has('message'))
    <div class="alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="header">
        <h3>Create publication</h3>
    </div>
    @if ($toggle)
        @livewire('post-form', ['user' => $user])
    @endif
    <div class="text" wire:click = "showPostForm">
        <i class="fas fa-user-circle"></i>
        <input type="text" placeholder="What are in you mind?, {{$user->name}} ">
    </div>
</div>