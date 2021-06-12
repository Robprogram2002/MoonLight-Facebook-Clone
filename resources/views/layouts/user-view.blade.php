@extends('layouts/app')

@section('links_css')
    <link rel="stylesheet" href=" {{asset('css/perfil-header.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/info-form.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/info-view.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/publication.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/album.css')}} ">
    <link rel="stylesheet" href=" {{asset('css/friends.css')}} ">

@endsection

@section('content_body')
    <div class="container">
        <div class="side-left"></div>

        @livewire('users.main', ['user' => $user])

        <div class="side-right"></div>
    </div>
@endsection
