<div class = "w-100">
    <div class=" w-50 container-fluid rounded-3 border-1 text-dark bg-white bg-gradient shadow-sm p-5">
        <div class="p-3">
            @auth
                <form wire:submit='savePost({{ auth()->user() }})' class="form-group mb-3 ">
                    @csrf
                    <textarea wire:model='post'
                        class="form-control bg-light text-dark mt-4 mb-3 border-0 @error('body') border-3 border-danger @enderror "
                        placeholder="Type post here" rows="2"></textarea>
                    @error('post')
                        <div class="w-100 text-danger p-2">{{ $message }}</div>
                    @enderror
                    <div class="container-fluid p-2 btn btn-group"><button class="btn btn-primary rounded mt-1"
                            type="submit">Post</button></div>
                </form>
            @endauth
            <div class="w-100 mt-4 bg-transparent overflow-y-scroll" style="height: 60vh;">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="container w-100 d-flex align-items-center bg-transparent bg-gradient mb-4 ">
                            <div class="">
                                <img src="{{ $post->user->getImageUrl() }}" alt="profile image"
                                    class="rounded-circle me-2" style="width:60px; height:60px">
                            </div>
                            <div>
                                <a href="{{ route('user.posts', $post->user->id) }}"
                                    class="fst-normal text-dark fw-bold text-decoration-none">{{ $post->user->name }}</a>
                                <small class="text-muted p-2">{{ $post->created_at->diffForHumans() }}</small>
                                <p class="fs-8 text-dark fst-normal mb-2 ps-0"><a class="text-decoration-none text-dark"
                                        href="{{ route('post.index', $post->id) }}">{{ $post->body }}</a></p>
                                <x-post-listing :post="$post"></x-post-listing>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="me-4">{{ $posts->links() }}</div> --}}
                @endif
            </div>
        </div>
    </div>
</div>
