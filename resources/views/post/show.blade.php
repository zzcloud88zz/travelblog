@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/post.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <h2>{{$post->caption}}</h2>
            <p> {{$post->story}}</p>
            <!-- edit button -->
            <div class="pt-3">
                <form action="{{ route('post.edit',$post->id) }}">
                    <button type="submit" class="btn btn-primary">Edit travel log</button>
                </form>
            </div>
            <!-- delete button -->            
            <div class="pt-3">
                <form action="{{ route('post.destroy',$post->id) }}" method="POST" id="deletepost">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete travel log</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
