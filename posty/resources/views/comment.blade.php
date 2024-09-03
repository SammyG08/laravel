@extends('layout.base')

@section('content')

<div class="w-100 mt-3 bg-transparent">
    <div class="container w-50 bg-white mb-4 p-5">
        <div class="container">
            <a href="{{route('user.posts', $post->user)}}" class="fs-6 fst-normal text-dark ps-2 fw-bold text-decoration-none">{{$post->user->name}}</a><small class="text-muted p-2">{{$post->created_at->diffForHumans()}}</small>
            <p class="fs-8 text-dark fst-normal mb-2 ps-2">{{$post->body}}</p>
            
        </div>
        <div class="container-fluid w-100">
            <form action="{{route('comment', $post)}}" class="form-group" method="post">
                @csrf
                <textarea name="body" class="form-control text-dark border-1 ps-2 mt-3 border-outline-0" placeholder="Post your comment here..." rows=2></textarea>
                @error('body')
                    <div class="container">
                        <p class="text-danger fs-6">{{$message}}</p>
                    </div>
                @enderror
                <div class="btn-group mt-3"><button type="submit" class="btn btn-primary text-white">Post</button></div>
            </form>
        </div>
    </div>
</div>


@endsection