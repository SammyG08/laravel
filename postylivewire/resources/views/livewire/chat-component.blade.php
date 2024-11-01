<div class=" container w-75 bg-dark-subtle ps-0 pe-0" style="height:80vh;">
    <div class="bg-light-subtle border float-right  border-bottom container-fluid" style="margin-bottom: 8%; height:12vh">
        <div class="mb-5 mt-4 float-start d-inline">
            <img src="{{ $user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2 float-start"
                style="width:70px; height:70px">
        </div>
        <div class="mt-4">
            <a href="{{ route('profile', $user->id) }}"
                class="fst-normal text-secondary fw-bold fs-4 text-decoration-none d-block">{{ $user->name }}</a>
            <small class="text-muted fw-semibold fst-normal">Last seen
                {{ $user->authenticated_at->diffForHumans() }}</small>
        </div>
    </div>
    <div class="container-fluid overflow-y-scroll bg-transparent"style="height: 55vh; margin-top: -20%;">
        @if ($messages->count())
            @foreach ($messages as $message)
                <div class="container mt-4 w-100">
                    <div class=" rounded-3 ps-2 pe-2 h-auto container-fluid pt-2 text-bottom mb-1 {{ $message->sender_id === auth()->user()->id ? 'me-0 bg-light-subtle shadow shadow-sm' : 'ms-0 bg-light-subtle shadow shadow-sm' }}"
                        style="width:45%;;">
                        <p class="text-dark p-2 fs-5 mb-0">{{ $message->message }}</p>
                        <div class="text-end"><small
                                class="text-muted d-inline-block ">{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="container w-75 mt-4 " style="height:50vh;">
        <form wire:submit="saveMessage" class="form-group">
            @csrf
            <div class="container d-flex justify-content-between align-items-end pb-4 pt-4">
                <textarea name="" id="" rows="1"
                    class="form-control border-1 border-light-subtle bg-light shadow shadow-sm" style="height: 1%" wire:model='message'
                    placeholder=" "></textarea>
                <button class="btn btn-primary btn-md ms-0" style="height:9%">send</button>
            </div>
        </form>

    </div>

</div>
