@extends('layout.base')

@section('content')

<div class="w-100 mt-3 bg-transparent">
    <div class="container w-50 bg-white mb-4 p-5">
        <a href="{{route('user.posts', $post->user)}}" class="fs-6 fst-normal text-dark fw-bold text-decoration-none">{{$post->user->name}}</a><small class="text-muted p-2">{{$post->created_at->diffForHumans()}}</small>
        <p class="fs-8 text-dark fst-normal mb-2 ps-0">{{$post->body}}</p>
        <x-post-listing :post="$post"></x-post-listing>
    </div>
</div>


@endsection
