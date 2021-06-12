@extends('layouts/app')

@section('links_css')
    <link rel="stylesheet" href=" {{asset('css/main.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/post-form-style.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/publication.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/comment.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/news.css')}} ">
@endsection

@section('content_body')
    <div class="container">
        <div class="side-left"></div>
        <main>
            @livewire('home-post', ['user' => Auth::user()])
            @livewire('list-posts', ['user' => Auth::user()])
        </main>
        <div class="side-right"></div>
    </div>
@endsection
