@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/post.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data" method="post" id="editpost">
                    @csrf

                    @method('PUT')
                    <div class="form-group row">
                        <label for="postpic">Post a picture</label>
                        <input type="file" name="postpic" id="postpic">
                    </div>

                    <div class="form-group row">
                        <label for="caption">Caption</label>
                        <input class="form-control" type="text" name="caption" id="caption" value="{{ $post->caption }}">
                    </div>

                    <div class="form-group row">
                        <label for="story">Story</label>
                        <textarea class="form-control" type="text" name="story" id="story">{{ $post->story }}</textarea>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Edit!</button>
                    </div>
                </form>
                <div class="form-group row">
                    <button type="submit" class="btn btn-danger" onclick="window.location='{{ route('post.show', $post->id) }}'">Cancel</button>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
