@extends('layout.base')

@section('content')
    <div class="container bg-transparent w-50 mb-4 p-3">
        <div class="container w-50">
            <p class="fs-5 text-dark p-3">Following</p>
        </div>
        @foreach ($followingUser as $arrayIndex)
            @foreach ($arrayIndex as $usermodel)
                @livewire('list-following', ['user' => $usermodel])
            @endforeach
        @endforeach
    </div>
@endsection
