@extends('layout.base')

@section('content')

    <div class="w-100 mt-3 bg-transparent">
        <div class="container w-50 bg-white d-flex align-items-center mb-4 p-5">
            <div class="">
                <img src="{{ $post->user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2"
                    style="width:60px; height:60px">
            </div>
            <div>
                <a href="{{ route('user.posts', $post->user) }}"
                    class="fs-6 fst-normal text-dark fw-bold text-decoration-none">{{ $post->user->name }}</a>
                <small class="text-muted p-2">{{ $post->created_at->diffForHumans() }}</small>
                <p class="fs-8 text-dark fst-normal mb-2 ps-0">{{ $post->body }}</p>
                <x-post-listing :post="$post"></x-post-listing>
            </div>
        </div>
    </div>

    @if ($comments->count())
        <div class="container w-50 mt-4 p-3 bg-white overflow-y-scroll" style="height:50vh;">
            <p class="text-center">Comments</p>
            @foreach ($comments as $comment)
                <div class="container w-100">
                    <div class="mb-3 pb-3 container-fluid ps-4 pt-4 bg-light d-flex align-items-center checker"
                        data-id="{{ $comment->id }}">
                        <div class="">
                            <img src="{{ $comment->user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2"
                                style="width:60px; height:60px">
                        </div>
                        <div>
                            <p class="w-50 text-dark fs-7 d-inline fw-bold">{{ $comment->user->name }}</p>
                            <p class="w-50 text-dark d-inline ps-2">
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </p>
                            <p class="w-50 text-dark d-block w-100 mb-0"><small>{{ $comment->body }}</small></p>
                            @auth
                                <div class="mt-1">
                                    <div id="actions{{ $comment->id }}">
                                        @if (!$comment->likedBy(auth()->user()))
                                            <div class="d-inline">
                                                <form data-url="{{ route('comment.like') }}" method="post"
                                                    id="like{{ $comment->id }}" class="w-100 d-inline"
                                                    action="javascript:void(0)">
                                                    @csrf
                                                    <input type="hidden" value="{{ $comment->id }}" name="likeId">
                                                    <button
                                                        class="border-0 text-primary ps-0 bg-transparent"><small>Like</small></button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="d-inline">
                                                <form data-url="{{ route('comment.unlike') }}" method="post"
                                                    id="unlike{{ $comment->id }}" class="w-100 d-inline"
                                                    action="javascript:void(0)">
                                                    @csrf
                                                    <input type="hidden" value="{{ $comment->id }}" name="unLikeId">
                                                    <button
                                                        class="border-0 text-primary ps-0 bg-transparent"><small>Unlike</small></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="d-inline">
                                        <a href="{{ route('reply', $comment->id) }}"
                                            class="text-decoration-none text-muted"><small>Reply</small></a>
                                    </div>

                                    @if ($comment->user_id === auth()->user()->id)
                                        <div class="d-inline">
                                            <form action="{{ route('delete.comment', [$comment->id]) }}" method="post"
                                                class="w-100 d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="border-0 bg-transparent ps-1 text-danger"><small>Delete</small></button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endauth
                            @if ($comment->replies->count())
                                <a href="{{ route('show.replies', $comment->id) }}"
                                    class=" d-block text-primary"><small>Show
                                        replies</small></a>
                            @endif
                            <p class="d-inline text-secondary"><small id="numberOfLikes"
                                    data-likes="{{ $comment->comment_likes->count() }}">{{ $comment->comment_likes->count() }}</small>
                            </p>
                            <p class="d-inline text-secondary">
                                <small>{{ Str::plural('like', $comment->comment_likes->count()) }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.checker').each(function(index) {
                // console.log($('.checker').data('id'));
                $("#like" + $(this).data('id')).submit(function(e) {
                    alert("like clicked");
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
                            alert("received response");
                            let updatedLikesCount = $("numberOfLikes").data(
                                "likes") + 1;
                            $("#actions" + response.id).html(`
                            <form class="w-100 d-inline " method="post" action="javascript:void(0)">
                                <button type="submit"
                                    class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small
                                        onclick="processUnlike(${response.id}, ${updatedLikesCount})">Unlike</small></button>
                            </form>
                            `);
                            $('numberOfLikes').text(updatedLikesCount);
                            // location.reload(false);
                        }

                    });
                });
            });
        });

        $(document).ready(function() {
            $('.checker').each(function(index) {
                // console.log($('.checker').data('id'));
                $("#unlike" + $(this).data('id')).submit(function(e) {
                    e.preventDefault(); // Prevent default form submission
                    // console.log($('.checker').data('id'));
                    alert("unlike clicked");
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        data: $(this).serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert("received response");
                            let updatedLikesCount = $("numberOfLikes").data(
                                "likes") - 1;
                            $("#actions" + response.id).html(`
                            <form class="w-100 d-inline " method="post" action="javascript:void(0)">
                                <button type="submit"
                                    class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small
                                        onclick="processLike(${response.id}, ${updatedLikesCount})">Like</small></button>
                            </form>
                            `);
                            $('numberOfLikes').text(updatedLikesCount);
                            // location.reload(false);
                        }
                    });
                });
            });
        });

        function processLike(id, likesCount) {
            // alert('like clicked');
            $.ajax({
                url: $("#like" + id).data('url'),
                type: 'POST',
                data: $("#like" + id).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#actions" + response.id).html(`
                        <form class="w-100 d-inline " method="post" action="javascript:void(0)">
                            <button type="submit"
                                class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small
                                    onclick="processUnlike(${response.id}, ${likesCount + 1})">Unlike</small></button>
                        </form> 
                    `);
                    $('numberOfLikes').text(likesCount + 1);

                }
            })
        }

        function processUnlike(id, likesCount) {
            // alert('Unlike clicked');
            $.ajax({
                url: $("#unlike" + id).data('url'),
                type: 'POST',
                data: $("#unlike" + id).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#actions" + response.id).html(`
                        <form class="w-100 d-inline " method="post" action="javascript:void(0)">
                            <button type="submit"
                                class="text-decoration-none border-0 text-primary ps-0 bg-transparent"><small
                                    onclick="processLike(${response.id}, ${likesCount - 1})">Like</small></button>
                        </form>
                    `);
                    $('numberOfLikes').text(likesCount - 1);

                }
            })
        }
    </script>
@endsection
