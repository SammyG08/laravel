@extends('layout.base')

@section('content')

<div class="w-100 mt-3 bg-transparent">
    <div class="container w-50 bg-white mb-4 p-5">
        <div class="container bg-light d-flex align-items-center p-4">
            <div class="">
                <img src="{{$comment->user->getImageUrl()}}" alt="profile image" class="rounded-circle me-2" style="width:60px; height:60px">
            </div>
            <div>
                <a href="" class="fs-6 fst-normal text-dark ps-2 fw-bold text-decoration-none">{{$comment->user->name}}</a><small class="text-muted p-2">{{$comment->created_at->diffForHumans()}}</small>
                <p class="fs-8 text-dark fst-normal mb-2 ps-2">{{$comment->body}}</p>
                @auth
                    <div class="d-inline ps-2">
                        <a href="{{route('reply', $comment)}}" class="text-decoration-none text-muted"><small>Reply</small></a>
                    </div>
                 @endauth
            </div>
        </div>
        <div class="mt-4 container w-50 p-2"><p class="fs-5 text-secondary text-center">Replies</p></div>
        <div class="container-fluid bg-transparent w-100">
            @foreach ($replies as $reply)
                <div class="container w-100 mb-4 bg-white text-dark p-1">
                    <a href="" class="text-decoration-none text-secondary fs-5">{{$reply->user->name}}</a>
                    <small class="ps-2 text-muted">{{$reply->created_at->diffForHumans()}}</small>
                    <p class="text-dark mt-2">{{$reply->body}}</p>
                    @auth
                        <div class="d-inline mt-0">
                            <a href="{{route('reply', $comment)}}" class="text-decoration-none text-muted"><small>Reply</small></a>
                        </div>
                        @if ($reply->user_id === auth()->user()->id)
                            <div class="d-inline">
                                <form action="{{route('delete.reply', $reply)}}" method="post" class="w-100 d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border-0 bg-transparent ps-1 text-danger"><small>Delete</small></button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection