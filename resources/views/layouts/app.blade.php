<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link cool-link    " href="{{ route('catalog') }}">LaraTest</a>
                <a class="nav-link cool-link    " href="{{ route('post.create') }}">Create</a>
            </li>
        </ul>
    </nav>
</header>
@if(Session::has('message'))
    <div class="mb-5">
        <div class="alert alert-{{ Session::get('message-type', 'info') }}">
            {{ Session::get('message') }}
        </div>
    </div>
@endif
<div class="container">
    @yield('content')
</div>
</body>
</html>
