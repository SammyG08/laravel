@props(['post'])

@auth
    @can('delete', $post)
        <form action="{{route('delete', $post)}}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-decoration-none border-0 bg-transparent ps-0 text-danger ">Delete</button>
        </form>
    @endcan
    @if (!$post->likedBy(auth()->user()))
        <form action="{{route('like', $post)}}" method="post" class="w-100 d-inline ">
            @csrf
            <button type="submit" class="text-decoration-none border-0 text-primary ps-0 bg-transparent">Like</button>
        </form>
    @else
        <form action="{{route('unlike', $post)}}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-decoration-none border-0 bg-transparent ps-0 text-primary ">Unlike</button>
        </form>
    @endif
@endauth
@if ($post->likes->count())
    <p class="d-inline text-secondary">{{$post->likes->count()}}</p>
    <p class="d-inline text-secondary">{{Str::plural('like', $post->likes->count())}}</p>
@endif
