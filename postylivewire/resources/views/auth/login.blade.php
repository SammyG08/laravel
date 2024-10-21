@extends('layout.base')
@section('content')
    <div class=" w-25 container-fluid bg-gradient rounded-3 border-1 text-dark bg-white bg-gradient shadow p-5">
        <div class="p-3">
            <div class="container text-center fs-5">Login</div>

            @livewire('login-component');
        </div>
    </div>
@endsection
