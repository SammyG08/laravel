@extends('layout.base')

@section('content')
    @livewire('follower-component', [
        'user' => $user,
        'followingCount' => $followingCount,
        'postCount' => $postCount,
        'userLikesReceived' => $userLikesReceived,
    ])
@endsection
