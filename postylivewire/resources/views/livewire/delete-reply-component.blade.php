<div>
    @foreach ($replies as $reply)
        <div class="container w-100 mb-4 bg-white text-dark p-1">
            <a href="" class="text-decoration-none text-secondary fs-5">{{ $reply->user->name }}</a>
            <small class="ps-2 text-muted">{{ $reply->created_at->diffForHumans() }}</small>
            <p class="text-dark mt-2">{{ $reply->body }}</p>
            @auth
                @if ($reply->user_id === auth()->user()->id)
                    <div class="d-inline">
                        <form wire:submit="delete({{ $reply }})" class="w-100 d-inline">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <button class="border-0 bg-transparent ps-1 text-danger"><small>Delete</small></button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    @endforeach

</div>
