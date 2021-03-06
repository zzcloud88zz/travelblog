@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/post.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post" id="createpost">
                    @csrf
                    <div class="form-group row">
                        <label for="postpic">Post a picture</label>
                        <input type="file" name="postpic" id="postpic">
                    </div>

                    <div class="form-group row">
                        <label for="caption">Caption</label>
                        <input class="form-control" type="text" name="caption" id="caption">
                    </div>

                    <div class="form-group row">
                        <label for="story">Story</label>
                        <textarea class="form-control" type="text" name="story" id="story"></textarea>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Post!</button>
                    </div>
                </form>
                <div class="form-group row">
                    <button type="submit" class="btn btn-danger" onclick="window.location='{{ route('profile') }}'">Cancel</button>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
