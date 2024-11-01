@extends('layout.base')

@section('content')
    <div class="container bg-transparent w-50 mb-4 p-3">
        <div class="container w-50 d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <div><img src="{{ $user->getImageUrl() }}" alt="profile image" class="rounded-circle me-4"
                        style="width:75px; height:75px"></div>
                <div>
                    <span class=" fs-5 text-dark d-block">{{ $user->name }}</span>
                    <span class=" fs-6 text-dark d-block">
                        <a href="{{ route('followers', $user->id) }}" class="text-decoration-none text-dark fw-bold"
                            id="followersCount" data-count="{{ $user->followers->count() }}">
                            {{ $user->followers->count() }} <small
                                class = "fw-normal">{{ Str::plural('Follower', $user->followers->count()) }}</small>
                        </a>
                        @if ($followingCount)
                            <a href="{{ route('following', $user->id) }}" class="text-decoration-none text-dark fw-bold">
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
            <div id="followactions">
                @auth
                    @if (!$user->accountOwner(auth()->user()))
                        @if (!$user->following(auth()->user()))
                            <form data-url="{{ route('user.follow', $user->id) }}" method="post" id="follow"
                                action="javascript:void(0)">
                                @csrf
                                {{-- <input type="hidden" value="{{ $user->id }}" name="userFollowId" id="userId"> --}}
                                <button class="btn bg-primary text-white fw-bold btn-md text-end" type="submit">Follow</button>
                            </form>
                        @else
                            <form data-url="{{ route('user.unfollow', $user->id) }}" method="post" id="unfollow">
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
@endsection

@section('script')
    <script>
        function unfollow(oldCount, url) {
            // alert('unfollow clicked');
            // alert(url);
            oldCount -= 1;
            $.ajax({
                url: url,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // alert('received a response from server');
                    $("#followactions").html(`
                                <form>
                                    <button class="btn bg-primary text-white fw-bold btn-md text-end"
                                    type="submit" onclick="follow(${oldCount}, '${response.url}')">Follow</button>
                                <form>
                           `);
                    if (oldCount == 1) {
                        $("#followersCount").html(oldCount +
                            " " +
                            "<small class = 'fw-normal'>Follower</small>");
                    } else {
                        $("#followersCount").html(oldCount +
                            " " +
                            "<small class = 'fw-normal'> Followers</small>");
                    }
                }
            })

        }

        function follow(oldCount, url) {
            // alert('follow clicked');
            oldCount += 1;
            $.ajax({
                url: url,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // alert('received a response from server');
                    $("#followactions").html(`
                                <form>
                                    <button class="btn bg-primary text-white fw-bold btn-md text-end"
                                    type="submit" onclick="unfollow(${oldCount}, '${response.url}')">Unfollow</button>
                                <form>
                           `);
                    if (oldCount == 1) {
                        $("#followersCount").html(oldCount +
                            " " +
                            "<small class = 'fw-normal'>Follower</small>");
                    } else {
                        $("#followersCount").html(oldCount +
                            " " +
                            "<small class = 'fw-normal'> Followers</small>");
                    }
                }
            })
        }

        $(document).ready(function() {
            // console.log($('.checker').data('id'));
            $("#follow").submit(function(e) {
                e.preventDefault(); // Prevent default form submission
                // console.log($('.checker').data('id'));
                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        let count = $("#followersCount").data('count') + 1
                        $("#followactions").html(`
                                <button class="btn bg-primary text-white fw-bold btn-md text-end"
                                    type="submit" onclick="unfollow(${count}, '${response.url}')">Unfollow</button>
                           `);
                        if (count == 1) {
                            $("#followersCount").html(count +
                                " " +
                                "<small class = 'fw-normal'>Follower</small>");
                        } else {
                            $("#followersCount").html(count +
                                " " +
                                "<small class = 'fw-normal'> Followers</small>");
                        }

                    }


                });
            });
        });
        $(document).ready(function() {
            // console.log($('.checker').data('id'));
            $("#unfollow").submit(function(e) {
                e.preventDefault(); // Prevent default form submission
                // console.log($('.checker').data('id'));
                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        let count = $("#followersCount").data('count') - 1
                        $("#followactions").html(`
                                <button class="btn bg-primary text-white fw-bold btn-md text-end"
                                    type="submit" onclick="follow(${count}, '${response.url}')">Follow</button>
                           `);
                        if (count == 1) {
                            $("#followersCount").html(count +
                                " " +
                                "<small class = 'fw-normal'>Follower</small>");
                        } else {
                            $("#followersCount").html(count +
                                " " +
                                "<small class = 'fw-normal'> Followers</small>");
                        }
                    }

                });
            });
        });
    </script>
@endsection
