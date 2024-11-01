@extends('layout.base')

@section('content')
    @auth
        <div class="container bg-transparent w-50 mb-4 p-3">
            <div class="container w-50 text-center">
                <span class=" fs-5 text-dark d-block">{{ $user->name }}</span>
            </div>
            <div class="container text-center w-50">
                <span class=" fs-6 text-dark d-block">
                    <a href="{{ route('user.follow', $user) }}" class="text-decoration-none text-dark fw-bold">
                        {{ $user->followers->count() }} <small
                            class = "fw-normal">{{ Str::plural('Follower', $user->followers->count()) }}</small>
                    </a>
                </span>
                <small class="text-muted ps-0 fw-bold">{{ $user->posts()->count() }}
                    {{ Str::plural('post', $user->posts()->count()) }}
                    {{ $user->receivedLikes()->count() }} {{ Str::plural('like', $user->receivedLikes()->count()) }}
                </small>
            </div>
            <div class="container-fluid mt-4 w-50">
                <form enctype="multipart/form-data" action="{{ route('store.edit', $user->id) }}"
                    class="form-group container mt-4 w-100 ps-0" method="POST">
                    @csrf
                    <input type="file" class="form-control w-100 mb-4 border border-0" name="image">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" placeholder="{{ $user->name }}"
                        class="form-control w-100 mb-0 border border-0">
                    @error('name')
                        <span class="text-danger d-block mb-4">{{ $message }}</span>
                    @enderror
                    <label for="username" class="form-label">Userame:</label>
                    <input type="text" name="username" placeholder="{{ $user->username }}"
                        class="form-control mb-0 w-100 border border-0">
                    @error('username')
                        <span class="text-danger d-block mb-4">{{ $message }}</span>
                    @enderror
                    <label for="name" class="form-label">Bio:</label>
                    <textarea name="bio" placeholder = "{{ $user->bio }}" class="form-control w-100 mb-2 border border-0" rows=1></textarea>
                    <button type="submit" class="btn btn-primary btn-sm mt-2 text-center">Save</button>
                </form>
            </div>
        @endauth
    @endsection
