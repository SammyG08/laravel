@extends('layout.base')

@section('content')
    <div class="container w-50 bg-transparent mb-4 p-2 px-3">
        <p class=" fs-4 text-secondary text-start">Chats</p>
    </div>
    <div class="w-100 mt-4 bg-transparent">
        @if ($users->count())
            @foreach ($users as $user)
                <div class="container w-50 d-flex align-items-center p-2 bg-light-subtle bg-gradient border border-bottom-1">
                    <div class="">
                        <img src="{{ $user->getImageUrl() }}" alt="profile image" class="rounded-circle me-2"
                            style="width:60px; height:60px">
                    </div>
                    <div>
                        <a href="{{ route('message', $user) }}"
                            class="fst-normal text-dark fw-bold text-decoration-none">{{ $user->name }}</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="container w-50 bg-transparent p-2 px-3">
                <p class=" fs-6 text-secondary text-center">Nothing to show</p>
            </div>
        @endif

    </div>
@endsection
