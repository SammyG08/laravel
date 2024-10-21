@extends('layout.base')

@section('content')

    <div class="container w-25 mt-2 p-3">
        <form action="{{ route('find.user') }}" class="form-group">
            <div class="container text-center ">
                <input type="search" class="form-control w-75 border border-2 d-inline p-1 " name="search"
                    placeholder="Search for user here...">
                <div class="d-inline"><button class="bg-secondary rounded-3 ms-2 border-0 p-1 px-3 d-inline text-white"
                        type="submit">Search</button></div>
            </div>
        </form>
    </div>
    @if (isset($results))
        <div class="container w-50 mt-0 p-4">
            @if ($results->count())
                @foreach ($results as $result)
                    <div class="container w-50 mt-0 p-3 border-bottom border-dark-subtle ">
                        <a href="{{ route('user.posts', $result) }}"
                            class="text-dark text-decoration-none d-block ps-4 fs-5">{{ $result->name }}</a>
                        <span class="text-muted d-inline ps-4 fw-bold">@</span><a href="{{ route('user.posts', $result) }}"
                            class="text-muted text-decoration-none fw-bold fs-6">{{ $result->username }}</a>
                    </div>
                @endforeach
            @else
                <div class="container w-25 mt-0 p-3 ">
                    <span class="text-muted d-inline ps-4 fw-bold">No such user found</span>
                </div>
            @endif
        </div>
    @endif
    @auth
        @if (isset($users))
            <div class="container p-4 w-50 mt-4">
                <div class="container w-50 mb-4 text-center"><span class="text-muted fs-4 p-1 text-center">Discover Users</span>
                </div>
                @foreach ($users as $index)
                    @foreach ($index as $usermodel)
                        @livewire('update-follow', ['user' => $usermodel])
                    @endforeach
                @endforeach
            </div>
        @endif
    @endauth
@endsection
