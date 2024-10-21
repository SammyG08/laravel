@extends('layout.base')
@section('content')
    <div class="container bg-white shadow shadow-sm overflow-y-scroll">

        <div class="container w-50 bg-transparent mb-4 p-2 px-3">
            <p class=" fs-4 text-secondary text-center">Trending Topics</p>
        </div>
        <div class="w-100 mt-4 bg-transparent ">
            @foreach ($trendingPosts as $array)
                @foreach ($array as $post)
                    <div class="container w-100 d-flex align-items-center bg-transparent bg-gradient mb-4">
                        <div class="">
                            <img src="{{ $post->user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2"
                                style="width:60px; height:60px">
                        </div>
                        <div class="mb-4">
                            <a href="{{ route('user.posts', $post->user->id) }}"
                                class="fst-normal text-dark fw-bold text-decoration-none">{{ $post->user->name }}</a>
                            <small class="text-muted p-2">{{ $post->created_at->diffForHumans() }}</small>
                            <p class="fs-8 text-dark fst-normal mb-2 ps-0"><a class="text-decoration-none text-dark"
                                    href="{{ route('post.index', $post->id) }}">{{ $post->body }}</a></p>
                            <x-post-listing :post="$post"></x-post-listing>
                        </div>
                    </div>
                @endforeach
            @endforeach

        </div>
    </div>
@endsection
