@extends('layouts.app')
@section('content')
    <form class="" action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" type="text">
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" type="text"> </textarea>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif


        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
@endsection
