@auth

    @if (!$comment->likedBy(auth()->user()))
        <form id="like{{ $comment->id }}" class="w-100 d-inline " method="post" data-url="{{ route('comment.like') }}"
            action="javascript:void(0)">
            @csrf
            <input type="hidden" value="{{ $comment->id }}" name="likeId">
            <button type="submit" id="submitlike"
                class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small
                    onclick="processLike({{ $comment->id }})">Like</small></button>
        </form>
    @else
        <form method="post" class="d-inline" data-url="{{ route('comment.unlike') }}" action="javascript:void(0)"
            id="unlike{{ $comment->id }}">
            @csrf
            {{-- @method('DELETE') --}}
            <input type="hidden" value="{{ $comment->id }}" name="unLikeId">
            <button type="submit" class="text-decoration-none border-0 bg-transparent ps-0 text-primary "><small
                    onclick="processUnlike({{ $comment->id }})">Unlike</small></button>
        </form>
    @endif
    <div class="d-inline">
        <a href="{{ route('reply', $comment->id) }}" class="text-decoration-none text-muted"><small>Reply</small></a>
    </div>

    @if ($comment->user_id === auth()->user()->id)
        <div class="d-inline">
            <form action="{{ route('delete.comment', [$comment->id]) }}" method="post" class="w-100 d-inline">
                @csrf
                @method('DELETE')
                <button class="border-0 bg-transparent ps-1 text-danger"><small>Delete</small></button>
            </form>
        </div>
    @endif
@endauth
@if ($comment->replies->count())
    <a href="{{ route('show.replies', $comment->id) }}" class=" d-block text-primary"><small>Show
            replies</small></a>
@endif
<p class="d-inline text-secondary"><small>{{ $comment->comment_likes->count() }}</small>
</p>
<p class="d-inline text-secondary">
    <small>{{ Str::plural('like', $comment->comment_likes->count()) }}</small>
</p>
