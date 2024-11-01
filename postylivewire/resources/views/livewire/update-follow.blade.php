<div>
    @if (!$user->accountOwner(auth()->user()))
        @if (!$user->accountOwner(auth()->user()))
            @if (!$user->following(auth()->user()))
                <div class="container w-50 p-2 d-flex justify-content-between bg-light-subtle border border-1 ">
                    <div><span class=" fs-5 text-secondary d-block "><a href="{{ route('user.posts', $user->id) }}"
                                class="text-decoration-none text-secondary">{{ $user->name }}</a></span>
                        <small class="text-secondary d-block fw-bold">@
                            <a href="{{ route('user.posts', $user->id) }}"
                                class="text-decoration-none text-secondary">{{ $user->username }}</a></small>
                    </div>
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
                    {{-- @livewire('update-follow', ['user' => $usermodel], key($usermodel->id)) --}}
                </div>
            @endif
        @endif
    @endif

</div>
