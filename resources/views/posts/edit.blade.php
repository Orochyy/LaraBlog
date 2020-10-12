@extends('layouts.app')
@section('content')

    <form action="{{ route('post.update',array('id' => $post->id)) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name',$post->name) }}">

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">

            <label for="description">Description</label>
            <textarea class="form-control" name="description"
                      id="description">{{ old('description',$post->description) }}</textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>

        <input class="btn btn-primary" type="submit" value="Submit">

    </form>


@endsection
