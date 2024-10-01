@props(['post'])

@auth
    <!-- <form action="{{route('comment', $post)}}" method="post" class="d-inline">
        @csrf
        <button type="submit" class="text-decoration-none border-0 bg-transparent ps-0 text-primary ">Comment</button>
    </form> -->
    @if (!$post->likedBy(auth()->user()))
        <form action="{{route('like', $post)}}" method="post" class="w-100 d-inline ">
            @csrf
            <button type="submit" class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small>Like</small></button>
        </form>
    @else
        <form action="{{route('unlike', $post)}}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-decoration-none border-0 bg-transparent ps-0 text-primary "><small>Unlike</small></button>
        </form>
    @endif
    <a href="{{route('comment', $post)}}" class="text-decoration-none me-1"><small>Comment</small></a>        
    @can('delete', $post)
        <form action="{{route('delete', $post)}}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-decoration-none border-0 bg-transparent ps-0 text-danger "><small>Delete</small></button>
        </form>
    @endcan
@endauth
<div class="w-100">
    @if ($post->likes->count())
        <p class="d-inline text-secondary"><small>{{$post->likes->count()}}</small></p>
        <p class="d-inline text-secondary"><small>{{Str::plural('like', $post->likes->count())}}</small></p>
    @endif
    @if ($post->comments()->count())
        <p class="d-inline text-secondary ps-1"><small>{{$post->comments->count()}}</small></p>
        <p class="d-inline text-secondary"><small>{{Str::plural('comment', $post->comments->count())}}</small></p>
    @endif
</div>
