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

        <div class="d-inline-flex">
            <form class="form-group mb-0 ml-3" action="{{ route('post.delete', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger form-control text-black-50" type="submit" value="Delete">
            </form>
        </div>
    </div>
@endsection
