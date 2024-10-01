@extends('layout.base')

@section('content')
    <div class="container bg-transparent w-50 mb-4 p-3">
        <div class="container w-50">
            <p class="fs-5 text-dark p-3">Followers</p>
        </div>
        @foreach ($userModel as $model)
            @foreach ($model as $usermodel)
                <div class="container w-100 d-flex mb-3 justify-content-between">
                    <div class="container">
                        <span class=" fs-5 text-secondary d-block"><a href="{{ route('user.posts', $usermodel) }}"
                                class="text-decoration-none text-secondary">{{ $usermodel->name }}</a></span>
                        <small class="text-secondary d-block"><small class="fw-bolder">@</small><a
                                href="{{ route('user.posts', $usermodel) }}"
                                class="text-decoration-none text-secondary">{{ $usermodel->username }}</a></small>
                    </div>
                    @auth
                        <div class="container w-100">
                            @if (!$usermodel->accountOwner(auth()->user()))
                                @if (!$usermodel->following(auth()->user()))
                                    @if (!auth()->user()->following($usermodel))
                                        <form action="{{ route('user.follow', $usermodel) }}" method="post">
                                            @csrf
                                            <button class="btn bg-primary text-white fw-bold btn-sm text-end"
                                                type="submit"><small>Follow</small></button>
                                        </form>
                                    @else
                                        <form action="{{ route('user.follow', $usermodel) }}" method="post">
                                            @csrf
                                            <button class="btn bg-primary text-white fw-bold btn-sm text-start"
                                                type="submit"><small>Follow Back</small></button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('user.follow', $usermodel) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn bg-primary text-white fw-bold btn-sm text-end"
                                            type="submit"><small>Unfollow</small></button>
                                    </form>
                                @endif
                            @else
                                <form action="{{ route('profile', $usermodel) }}" method="get">
                                    <button class="btn bg-primary text-white fw-bold btn-sm text-start"
                                        type="submit"><small>View Profile</small></button>
                                </form>
                            @endif
                        </div>
                    @endauth
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
