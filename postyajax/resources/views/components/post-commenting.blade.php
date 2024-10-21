@props(['comments'])
@if($comments->count())
    @foreach ($comments as $comment)
        <div class="container w-100">
            <div class="mb-3">
                <p class="w-50 text-dark fs-7 d-inline fw-bold">{{$comment->user->name}}</p>
                <p class="w-50 text-dark d-inline ps-2"><small>{{$comment->body}}</small></p>
                @auth
                @if (!$comment->likedBy(auth()->user()))
                    <form action="" class="w-100 d-inline">
                        @csrf
                        <button class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small>Like</small></button>
                    </form>
                @else
                    <form action="" class="w-100 d-inline">
                        @csrf
                        <button class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small>Unlike</small></button>
                    </form>
                @endif
                @endauth
            </div>
        </div>
    @endforeach
@endif