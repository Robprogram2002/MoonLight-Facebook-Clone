<div class="list-posts">
    @foreach ($posts as $post)
        @livewire('post', ['publication' => $post, 'auth_user' => Auth::user() ])
    @endforeach
</div>
