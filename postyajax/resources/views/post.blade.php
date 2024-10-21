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
                <form id="post" action="{{ route('save.post') }}" method="post">
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
                <div class="container w-100 d-flex align-items-center bg-transparent bg-gradient mb-4 " id="newpost">

                </div>
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="container w-100 d-flex align-items-center bg-transparent bg-gradient mb-4 ">
                            <div class="">
                                <img src="{{ $post->user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2"
                                    style="width:60px; height:60px">
                            </div>
                            <div>
                                <a href="{{ route('user.posts', $post->user) }}"
                                    class="fst-normal text-dark fw-bold text-decoration-none">{{ $post->user->name }}</a>
                                <small class="text-muted p-2">{{ $post->created_at->diffForHumans() }}</small>
                                <p class="fs-8 text-dark fst-normal mb-2 ps-0"><a class="text-decoration-none text-dark"
                                        href="{{ route('post.index', $post) }}">{{ $post->body }}</a></p>
                                <x-post-listing :post="$post"></x-post-listing>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->onEachSide(5)->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#post").submit(function(event) {
            event.preventDefault();
            // alert('hello there');
            $.ajax({
                url: "{{ route('save.post') }}",
                type: 'POST',
                data: jQuery("#post").serialize(),
                success: function(response) {
                    jQuery("#post")[0].reset();

                    // alert(response.post.body);
                    window.history.back();


                }

            });
        });
        $(document).ready(function() {
            $('#like').submit(function(e) {
                e.preventDefault(); // Prevent default form submission
                $.ajax({
                    url: $("#like").data('url'),
                    type: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // $("#like").text("Unlike");
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                    },
                });
            });
        });
        // $(document).ready(function() {
        //     $('#unlike').submit(function(e) {
        //         e.preventDefault(); // Prevent default form submission
        //         $.ajax({
        //             url: $("#unlike").data('url'),
        //             type: 'POST',
        //             data: $(this).serialize(),
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             success: function(response) {
        //                 // $("#unlike").text("Unlike");
        //             },
        //             error: function(xhr, status, error) {
        //                 // Handle error response
        //             }
        //         })
        //     })
        // });
    </script>
@endsection
