@extends('layout.base')

@section('content')

<div class="container bg-transparent text-center mb-4 p-3">
    <span class=" fs-5 text-dark d-block">{{$user->name}}</span>
    <small class="text-muted ps-1 fw-bold">{{$user->posts()->count()}} {{Str::plural('post', $user->posts()->count())}}
        {{$user->receivedLikes()->count()}} {{Str::plural('like', $user->receivedLikes()->count())}}
    </small>
</div>
<div class="container w-50 pt-2 mb-5 bg-white">
    @foreach ($posts as $post)
        <div class="container pt-2 bg-transparent bg-gradient mb-4">
            <p class="fs-6 fst-normal text-dark fw-bold d-inline">{{$post->user->name}}</p><small class="text-muted p-2">{{$post->created_at->diffForHumans()}}</small>
            <p class="fs-8 text-dark fst-normal mb-2 ps-0"><a class="text-decoration-none text-dark" href="{{route('post.index', $post)}}">{{$post->body}}</a></p>
            <x-post-listing :post="$post"></x-post-listing>
        </div>       
    @endforeach
    <div class="p-3">{{$posts->onEachSide(5)->links()}}</div>
</div>
@endsection