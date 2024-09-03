@extends('layout.base')

@section('content')

    <div class="w-100 mt-3 bg-transparent">
        <div class="container w-50 bg-white mb-4 p-5">
            <a href="{{route('user.posts', $post->user)}}" class="fs-6 fst-normal text-dark fw-bold text-decoration-none">{{$post->user->name}}</a>
            <small class="text-muted p-2">{{$post->created_at->diffForHumans()}}</small>
            <p class="fs-8 text-dark fst-normal mb-2 ps-0">{{$post->body}}</p>
            <x-post-listing :post="$post"></x-post-listing>
        </div>
    </div>
    
    @if($comments->count())
        <div class="container w-50 mt-4 p-3 bg-white">
            <p class="text-center">Comments</p>
            @foreach ($comments as $comment)
                <div class="container w-100">
                    <div class="mb-3 pb-3 ps-4 pt-4 bg-light">
                        <p class="w-50 text-dark fs-7 d-inline fw-bold">{{$comment->user->name}}</p>
                        <p class="w-50 text-dark d-inline ps-2"><small>{{$comment->created_at->diffForHumans()}}</small></p>
                        <p class="w-50 text-dark d-block mb-0"><small>{{$comment->body}}</small></p>
                        @auth
                        <div class="mt-1">
                            @if (!$comment->likedBy(auth()->user()))
                            <div class="d-inline">
                                <form action="{{route('comment.like', [$post, $comment])}}" method="post" class="w-100 d-inline">
                                    @csrf
                                    <button class="border-0 text-primary ps-0 bg-transparent"><small>Like</small></button>
                                </form>
                            </div>
                            @else
                            <div class="d-inline">
                                <form action="{{route('comment.like', [$post, $comment])}}" method="post" class="w-100 d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border-0 text-primary ps-0 bg-transparent"><small>Unlike</small></button>
                                </form>
                            </div>
                            @endif
                            <div class="d-inline">
                                <a href="{{route('reply', $comment)}}" class="text-decoration-none text-muted"><small>Reply</small></a>
                            </div>
                            @if ($comment->user_id === auth()->user()->id)
                            <div class="d-inline">
                                <form action="{{route('delete.comment', [$post, $comment])}}" method="post" class="w-100 d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border-0 bg-transparent ps-1 text-danger"><small>Delete</small></button>
                                </form>
                            </div>
                            @endif
                        </div>
                        @endauth
                        @if ($comment->replies->count())
                            <a href="{{route('show.replies', $comment)}}" class=" d-block text-primary"><small>Show replies</small></a>
                        @endif
                        <p class="d-inline text-secondary"><small>{{$comment->comment_likes->count()}}</small></p>
                        <p class="d-inline text-secondary"><small>{{Str::plural('like', $comment->comment_likes->count())}}</small></p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


@endsection
