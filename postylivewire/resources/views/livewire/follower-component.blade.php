<div>
    <div class="container bg-transparent w-50 mb-4 p-3">
        <div class="container w-50 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div><img src="{{ $user->getImageUrl() }}" alt="profile image" class="rounded-circle me-4"
                        style="width:75px; height:75px"></div>
                <div>
                    <span class=" fs-5 text-dark d-block">{{ $user->name }}</span>
                    <span class=" fs-6 text-dark d-block">
                        <a href="{{ route('followers', $user) }}" class="text-decoration-none text-dark fw-bold">
                            {{ $user->followers->count() }} <small
                                class = "fw-normal">{{ Str::plural('Follower', $user->followers->count()) }}</small>
                        </a>
                        @if ($followingCount)
                            <a href="{{ route('following', $user) }}" class="text-decoration-none text-dark fw-bold">
                                {{ $followingCount }} <span class="fw-normal">following</span>
                            </a>
                        @else
                            <span class="text-decoration-none text-dark fw-bold">
                                {{ $followingCount }} <span class="fw-normal">following</span>
                            </span>
                        @endif
                    </span>
                    <small class="text-muted ps-0 fw-bold">{{ $postCount }}
                        {{ Str::plural('post', $postCount) }}
                        {{ $userLikesReceived }} {{ Str::plural('like', $userLikesReceived) }}
                    </small>
                </div>
            </div>
            @auth
                @if (!$user->accountOwner(auth()->user()))
                    @if (!$user->following(auth()->user()))
                        <form wire:submit='save'>
                            @csrf
                            <button class="btn bg-primary text-white fw-bold btn-md text-end" type="submit">Follow</button>
                        </form>
                    @else
                        <form wire:submit="delete">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <button class="btn bg-primary text-white fw-bold btn-md text-end"
                                type="submit">Unfollow</button>
                        </form>
                    @endif
                @else
                    <form action="{{ route('edit.profile', $user->id) }}" method="get">
                        <button class="btn bg-primary text-white fw-bold btn-sm text-end" type="submit">Edit Profile
                        </button>
                    </form>
                @endif
            @endauth
        </div>

    </div>
    @if ($posts->count())
        <div class="container w-50 pt-2 mb-5 bg-white overflow-y-scroll" style="height: 60vh;">
            @foreach ($posts as $post)
                <div class="container pt-2 bg-transparent d-flex align-items-ceneter bg-gradient mb-4">
                    <div class="">
                        <img src="{{ $post->user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2"
                            style="width:60px; height:60px">
                    </div>
                    <div>
                        <p class="fs-6 fst-normal text-dark fw-bold d-inline">{{ $post->user->name }}</p><small
                            class="text-muted p-2">{{ $post->created_at->diffForHumans() }}</small>
                        <p class="fs-8 text-dark fst-normal mb-2 ps-0"><a class="text-decoration-none text-dark"
                                href="{{ route('post.index', $post->id) }}">{{ $post->body }}</a></p>
                        <x-post-listing :post="$post"></x-post-listing>
                    </div>
                </div>
            @endforeach
            <div class="p-3">{{ $posts->onEachSide(5)->links() }}</div>
        </div>
    @else
        <div class="container text-center w-25 pt-2 mb-5 bg-transparent">
            <p class="fs-5 ">Nothing to show</p>
        </div>
    @endif
</div>
