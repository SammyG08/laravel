@extends('layout.base')
@section('content')

@if (session('message'))
    <div class=" container w-25 auto-close alert alert-success " role="alert">
        <small>{{session('message')}}</small>
    </div>
@endif
<!-- <div class="container bg-transparent text-muted bg-gradient p-2 text-center fs-3 mb-4"></div> -->
<div class=" w-50 container-fluid rounded-3 border-1 text-dark bg-white bg-gradient shadow-sm p-5">
    <div class="p-3">
        @auth
        <form action="{{ route('save.post')}}" method = "post" class="form-group mb-3 ">
            @csrf
            <textarea name="body" class="form-control bg-light text-dark mt-4 mb-3 @error('body') border-3 border-danger @enderror " placeholder="Type post here" rows="2"></textarea>
            @error('body')
                <div class="w-100 text-danger p-2">{{$message}}</div>
            @enderror
            <div class="container-fluid p-2 btn btn-group"><button class="btn btn-primary rounded mt-1" type="submit">Post</button></div>  
        </form>
        @endauth
        <div class="w-100 mt-3 bg-transparent">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="container w-100 bg-transparent bg-gradient mb-4">
                        <a href="{{route('user.posts', $post->user)}}" class="fs-6 fst-normal text-dark fw-bold text-decoration-none">{{$post->user->name}}</a>
                        <small class="text-muted p-2">{{$post->created_at->diffForHumans()}}</small>
                        <p class="fs-8 text-dark fst-normal mb-2 ps-0"><a class="text-decoration-none text-dark" href="{{route('post.index', $post)}}">{{$post->body}}</a></p>
                        <x-post-listing :post="$post"></x-post-listing>
                    </div>
                @endforeach
                {{$posts->onEachSide(5)->links()}}
            @endif
        </div>
    </div>
</div>

@endsection