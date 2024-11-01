<div>
    @auth

        @if (!$post->likedBy(auth()->user()))
            <form wire:submit='registerLike' class="w-100 d-inline ">
                @csrf
                <button type="submit"
                    class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small>Like</small></button>
            </form>
        @else
            <form wire:submit="destroy({{ auth()->user() }})" class="d-inline">
                @csrf
                {{-- @method('DELETE') --}}
                <button type="submit"
                    class="text-decoration-none border-0 bg-transparent ps-0 text-primary "><small>Unlike</small></button>
            </form>
        @endif
        <a href="{{ route('comment', $post->id) }}" class="text-decoration-none me-1"><small>Comment</small></a>
        @can('delete', $post)
            <form wire:submit="delete" class="d-inline" wire:confirm="Are you sure you want to delete this post?">
                @csrf
                {{-- @method('DELETE') --}}
                <button type="submit"
                    class="text-decoration-none border-0 bg-transparent ps-0 text-danger "><small>Delete</small></button>
            </form>
        @endcan
    @endauth
    <div class="w-100">
        @if ($post->likes->count())
            <p class="d-inline text-secondary"><small>{{ $post->likes->count() }}</small></p>
            <p class="d-inline text-secondary"><small>{{ Str::plural('like', $post->likes->count()) }}</small></p>
        @endif
        @if ($post->comments()->count())
            <p class="d-inline text-secondary ps-1"><small>{{ $post->comments->count() }}</small></p>
            <p class="d-inline text-secondary"><small>{{ Str::plural('comment', $post->comments->count()) }}</small></p>
        @endif
    </div>
</div>
