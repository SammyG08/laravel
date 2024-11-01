@extends('layout.base')
@section('content')
    @if (session('message'))
        <div class=" container w-25  alert alert-dark">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <!-- <div class="container bg-transparent text-muted bg-gradient p-2 text-center fs-3 mb-4"></div> -->
    <div class=" w-50 container-fluid rounded-3 border-1 text-dark bg-white bg-gradient shadow-sm p-5">
        <div class="p-3">

            @auth
                <form id="post" method="post" data-url="{{ route('save.post') }}" action="javascript:void(0)">
                    @csrf
                    <textarea name="body"
                        class="form-control bg-light text-dark mt-4 mb-3 border-0 @error('body') border-3 border-danger @enderror "
                        placeholder="Type post here" rows="2"></textarea>
                    @error('body')
                        <div class="w-100 text-danger p-2">{{ $message }}</div>
                    @enderror
                    <div class="container-fluid p-2 btn btn-group"><button class="btn btn-primary rounded mt-1" type="submit"
                            id="send">Post</button></div>
                </form>
            @endauth
            <div class="w-100 mt-4 bg-transparent overflow-y-scroll" style="height: 60vh">
                @if ($posts->count())
                    <div id="previousPost">
                        @foreach ($posts as $post)
                            <div class="container w-100 d-flex align-items-center bg-transparent bg-gradient mb-4 checker"
                                id="{{ $post->id }}" data-id="{{ $post->id }}">
                                <div>
                                    <img src="{{ $post->user->getImageUrl() }}" alt="profile image"
                                        class="rounded-circle me-2" style="width:60px; height:60px">
                                </div>
                                <div>
                                    <a href="{{ route('user.posts', $post->user->id) }}"
                                        class="fst-normal text-dark fw-bold text-decoration-none">{{ $post->user->name }}</a>
                                    <small class="text-muted p-2">{{ $post->created_at->diffForHumans() }}</small>
                                    <p class="fs-8 text-dark fst-normal mb-2 ps-0"><a class="text-decoration-none text-dark"
                                            href="{{ route('post.index', $post->id) }}">{{ $post->body }}</a></p>
                                    <div id="actions{{ $post->id }}" class="action" data-id="{{ $post->id }}">
                                        <x-post-listing :post="$post"></x-post-listing>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let html = $(".checker").html();
            // console.log(html);
            $("#post").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        jQuery("#post")[0].reset();
                        // alert('added to the table successfully');
                        $("#previousPost").prepend(response.html);
                        // location.reload(true);
                        // console.log($('.checker').data('id'));
                        // console.log(html + response.html);
                    }
                });
            });
        });

        function processUnlike(id) {
            // alert('Unlike clicked');
            $.ajax({
                url: $("#unlike" + id).data('url'),
                type: 'POST',
                data: $("#unlike" + id).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#actions" + response.id).html(response.html);
                }
            })
        }

        function processLike(id) {
            // alert('like clicked');
            $.ajax({
                url: $("#like" + id).data('url'),
                type: 'POST',
                data: $("#like" + id).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#actions" + response.id).html(response.html);
                }
            })
        }

        function processDelete(id) {
            // alert('delete clicked');
            if (confirm("Are you sure you want to delete this post")) {
                $.ajax({
                    url: $("#delete" + id).data('url'),
                    type: 'POST',
                    data: $("#delete" + id).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // $("#" + response.id).text("");
                        location.reload();
                        // console.log($("#" + response.id));
                    }
                })
            }
        }

        $(document).ready(function() {
            $('.checker').each(function(index) {
                // console.log($('.checker').data('id'));
                $("#like" + $(this).data('id')).submit(function(e) {
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
                            $("#actions" + response.id).html(response.html);
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
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        data: $(this).serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $("#actions" + response.id).html(response.html);
                            // location.reload(false);
                        }
                    });
                });
            });
        });

        $(document).ready(function() {
            $('.checker').each(function(index) {
                // console.log($('.checker').data('id'));
                $("#delete" + $(this).data('id')).submit(function(e) {
                    e.preventDefault(); // Prevent default form submission
                    if (confirm("Are you sure you want to delete this post")) {
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'POST',
                            data: $(this).serialize(),
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // $("#like").text("Unlike");
                                // alert('post deleted');
                                // window.history.back();
                                // $("#" + response.id).text("");
                                location.reload();
                            }

                        });
                    }

                });
            });

        });
    </script>
@endsection
