@extends('layout.base')

@section('content')

<div class="w-100 mt-3 bg-transparent">
    <div class="container w-50 bg-white mb-4 p-5">
        <div class="container d-flex align-items-center mb-4">
            <div class="">
                <img src="{{$comment->user->getImageUrl()}}" alt="profile image" class="rounded-circle me-2" style="width:60px; height:60px">
            </div>
            <div>
                <a href="{{ route('user.posts', $comment->user) }}" class="fs-6 fst-normal text-dark ps-2 fw-bold text-decoration-none">{{$comment->user->name}}</a><small class="text-muted p-2">{{$comment->created_at->diffForHumans()}}</small>
                <p class="fs-8 text-dark fst-normal mb-2 ps-2">{{$comment->body}}</p>
            </div>
        </div>
        <div class="container-fluid bg-transparent w-100 mt-4">
            <form action="{{route('store.reply', $comment)}}" class="form-group" method="post">
                @csrf
                <textarea name="body" class="form-control text-dark border-0 ps-2 mt-3" placeholder="Post your reply here..." rows=2></textarea>
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