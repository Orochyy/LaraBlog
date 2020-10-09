@extends('layouts.app')
@section('content')
    <h1 class="main-text">blogPosts</h1>
    @foreach($posts as $post)
        <div class="card mt-3 mb-3" style="">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="post/{{$post->id}}">Name: {{ $post->name }}</a>
                </h5>
                <p>Short description: </p>
                <p class="short"> {{ substr($post->description,0,200)}}</p>
                @if($post->created_at)
                    <p class="mt-5">Created at: {{ $post->created_at->format('d/m/Y') }}</p>
                @endif
            </div>


        </div>
    @endforeach

    {{ $posts->links() }}
@endsection

