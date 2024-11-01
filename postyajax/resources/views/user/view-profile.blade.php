@extends('layout.base')

@section('content')
    @auth
        <div class="container bg-transparent w-50 mb-4 p-3">
            <div class="container w-50">
                <div class="w-75 d-flex align-items-center">
                    <img src="{{ $user->getImageUrl() }}" alt="profile image" class="rounded-circle me-4"
                        style="width:75px; height:75px">
                    <div>
                        <span class=" fs-5 text-dark d-block">{{ $user->name }}</span>
                        <span class="text-dark d-block">
                            <a href="{{ route('followers', $user->id) }}" class="text-decoration-none text-dark fw-bold">
                                {{ $user->followers->count() }} <small
                                    class = "fw-normal">{{ Str::plural('Follower', $user->followers->count()) }}</small>
                            </a>
                            @if ($follower->getFollowing($user))
                                <a href="{{ route('following', $user->id) }}" class="text-decoration-none text-dark fw-bold">
                                    {{ $follower->getFollowing($user) }} <span class="fw-normal">following</span>
                                </a>
                            @else
                                <span class="text-decoration-none text-dark fw-bold">
                                    {{ $follower->getFollowing($user) }} <span class="fw-normal">following</span>
                                </span>
                            @endif
                        </span>
                        <small class="text-muted ps-0 fw-bold">{{ $user->posts()->count() }}
                            {{ Str::plural('post', $user->posts()->count()) }}
                            {{ $user->receivedLikes()->count() }} {{ Str::plural('like', $user->receivedLikes()->count()) }}
                        </small>
                    </div>
                </div>
            </div>
            @if ($user->bio)
                <div class="container mt-4 w-50">
                    <span class="d-block fs-6 p-0 text-muted fw-bold">Bio:</span>
                    <span class=" d-block text-secondary">{{ $user->bio }}</span>
                </div>
            @endif
            <div class="container mt-4 w-50">
                <button class="btn btn-success btn-sm"><a href="{{ route('edit.profile', $user->id) }}"
                        class="text-decoration-none text-white">Edit Profile</a></button>
            </div>
        @endauth
    @endsection
