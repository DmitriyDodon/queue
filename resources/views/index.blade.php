@extends('layout')

@section('content')
    @auth
        <a href="/user" class="btn btn-primary">Profile</a>
    @endauth
    @guest
        <a href="/login" class="btn btn-primary">Login</a>
    @endguest
    <a href="/geo" class="btn btn-primary">Save your ip</a>

    <button class="btn btn-primary" id="mkQueue">Make a queue <br> (after seeding)</button>

@endsection
<script>
    window.onload = function () {
        document.querySelector('#mkQueue').onclick = function () {
            ajaxGet('GET' , 'queue');

            document.querySelector('#alert').style.visibility = "visible";

        }

    }


    function ajaxGet(method , url) {
        let request = new XMLHttpRequest();
        request.open( method, url );
        request.send();
    }
</script>
