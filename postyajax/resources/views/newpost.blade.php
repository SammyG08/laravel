<div class="container w-100 d-flex align-items-center bg-transparent bg-gradient mb-4 " class="newpost"
    data-id="{{ $post->id }}">
    <div>
        <img src="{{ $post->user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2"
            style="width:60px; height:60px">
    </div>
    <div>
        <a href="{{ route('user.posts', $post->user->id) }}"
            class="fst-normal text-dark fw-bold text-decoration-none">{{ $post->user->name }}</a>
        <small class="text-muted p-2">{{ $post->created_at->diffForHumans() }}</small>
        <p class="fs-8 text-dark fst-normal mb-2 ps-0"><a class="text-decoration-none text-dark"
                href="{{ route('post.index', $post->id) }}">{{ $post->body }}</a></p>
        <div id="actions{{ $post->id }}">
            {{-- <x-post-listing :post="$post"></x-post-listing> --}}
            @auth

                @if (!$post->likedBy(auth()->user()))
                    <form id="like{{ $post->id }}" class="w-100 d-inline " method="post" data-url="{{ route('like') }}"
                        action="javascript:void(0)">
                        @csrf
                        <input type="hidden" value="{{ $post->id }}" name="likePostId" id="likePostId">
                        <button type="submit" id="submitlike"
                            class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small
                                onclick="processLike({{ $post->id }})">Like</small></button>
                    </form>
                @else
                    <form method="post" class="d-inline" data-url="{{ route('unlike') }}" action="javascript:void(0)"
                        id="unlike{{ $post->id }}">
                        @csrf
                        {{-- @method('DELETE') --}}
                        <input type="hidden" value="{{ $post->id }}" name="unlikePostId" id="unlikePostId">
                        <button type="submit"
                            class="text-decoration-none border-0 bg-transparent ps-0 text-primary "><small
                                onclick="processUnlike({{ $post->id }})">Unlike</small></button>
                    </form>
                @endif
                <a href="{{ route('comment', $post->id) }}" class="text-decoration-none me-1"><small>Comment</small></a>
                @can('delete', $post)
                    <form data-url="{{ route('delete') }}" method="post" class="d-inline" action="javascript:void(0)"
                        id="delete{{ $post->id }}">
                        @csrf
                        {{-- @method('DELETE') --}}
                        <input type="hidden" value="{{ $post->id }}" name="deletePostId" id="deletePostId">
                        <button type="submit" class="text-decoration-none border-0 bg-transparent ps-0 text-danger "><small
                                onclick="processDelete({{ $post->id }})">Delete</small></button>
                    </form>
                @endcan
            @endauth
            <div class="w-100">
                @if ($post->likes->count())
                    <p class="d-inline text-secondary"><small>{{ $post->likes->count() }}</small></p>
                    <p class="d-inline text-secondary"><small>{{ Str::plural('like', $post->likes->count()) }}</small>
                    </p>
                @endif
                @if ($post->comments()->count())
                    <p class="d-inline text-secondary ps-1"><small>{{ $post->comments->count() }}</small></p>
                    <p class="d-inline text-secondary">
                        <small>{{ Str::plural('comment', $post->comments->count()) }}</small>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
