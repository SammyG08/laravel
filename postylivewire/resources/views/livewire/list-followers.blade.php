<div>

    <div class="container w-100 d-flex mb-3 justify-content-between">
        <div class="container">
            <span class=" fs-5 text-secondary d-block"><a href="{{ route('user.posts', $user) }}"
                    class="text-decoration-none text-secondary">{{ $user->name }}</a></span>
            <small class="text-secondary d-block"><small class="fw-bolder">@</small><a
                    href="{{ route('user.posts', $user) }}"
                    class="text-decoration-none text-secondary">{{ $user->username }}</a></small>
        </div>
        @auth
            <div class="container w-100">
                @if (!$user->accountOwner(auth()->user()))
                    @if (!$user->following(auth()->user()))
                        @if (!auth()->user()->following($user))
                            <form wire:submit="save">
                                @csrf
                                <button class="btn bg-primary text-white fw-bold btn-sm text-end"
                                    type="submit"><small>Follow</small></button>
                            </form>
                        @else
                            <form wire:submit = "save">
                                @csrf
                                <button class="btn bg-primary text-white fw-bold btn-sm text-start"
                                    type="submit"><small>Follow
                                        Back</small></button>
                            </form>
                        @endif
                        {{-- @livewire('update-follow', ['user' => $user, 'fromFollowers' => true], key(str()->random(1000))) --}}
                    @else
                        <form wire:submit="delete">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <button class="btn bg-primary text-white fw-bold btn-sm text-end"
                                type="submit"><small>Unfollow</small></button>
                        </form>
                    @endif
                @else
                    <form action="{{ route('profile', $user->id) }}" method="get">
                        <button class="btn bg-primary text-white fw-bold btn-sm text-start" type="submit"><small>View
                                Profile</small></button>
                    </form>
                @endif
            </div>
        @endauth
    </div>
</div>
