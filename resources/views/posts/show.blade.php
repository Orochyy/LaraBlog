@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <h1 class="text-center">{{ $post->name }}</h1>
        <p class="description">
            {{ $post->description }}
        </p>

        @if($post->created_at)
            <p class="created">
                Created at: {{ $post->created_at->format('d/m/Y') }}
            </p>
        @endif

        @if($post->updated_at)
            <p class="updated">
                Updated at: {{ $post->updated_at->format('d/m/Y H:i') }}
            </p>
        @endif
        <div class="d-inline-flex">
            <button class="btn btn-warning" style="padding: 0">
                <a class='no-underline text-black-50' style="padding: 10px; text-decoration: none"
                   href="{{ route('post.edit',['id' => $post->id]) }}">EDIT</a>
            </button>
            <form class="form-group mb-0 ml-3" action="{{ route('post.delit', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger form-control text-black-50" type="submit" value="Delete">
            </form>
        </div>
    </div>
@endsection
