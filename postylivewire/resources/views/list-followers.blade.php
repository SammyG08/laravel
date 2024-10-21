@extends('layout.base')

@section('content')
    <div class="container bg-transparent w-50 mb-4 p-3">
        <div class="container w-50">
            <p class="fs-5 text-dark p-3">Followers</p>
        </div>
        @foreach ($userModel as $model)
            @foreach ($model as $usermodel)
                @livewire('list-followers', ['user' => $usermodel])
            @endforeach
        @endforeach
    </div>
@endsection
