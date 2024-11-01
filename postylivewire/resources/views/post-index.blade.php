@extends('layout.base')

@section('content')
    <div class="w-100 mt-3 bg-transparent">
        <div class="container w-50 bg-white d-flex align-items-center shadow-lg mb-4 p-5">
            <div class="">
                <img src="{{ $post->user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2"
                    style="width:60px; height:60px">
            </div>
            <div>
                <a href="{{ route('user.posts', $post->user->id) }}"
                    class="fs-6 fst-normal text-dark fw-bold text-decoration-none">{{ $post->user->name }}</a>
                <small class="text-muted p-2">{{ $post->created_at->diffForHumans() }}</small>
                <p class="fs-8 text-dark fst-normal mb-2 ps-0">{{ $post->body }}</p>
                @livewire('like-component', ['post' => $post, 'fromIndex' => true], key(str()->random(1500)))
            </div>
        </div>
    </div>
    @livewire('comment-like-component', ['post' => $post])
@endsection
