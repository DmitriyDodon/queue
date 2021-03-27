@extends('layout')

@section('content')
    @auth
        <a href="/user" class="btn btn-primary">Profile</a>
    @endauth
    @guest
        <a href="/login" class="btn btn-primary">Login</a>
    @endguest
        <a href="/geo" class="btn btn-primary">Save your ip</a>

@endsection
