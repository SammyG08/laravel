@extends('layout.base')
@section('content')
    <div class=" w-25 container-fluid bg-gradient rounded-3 border-1 text-dark bg-white bg-gradient shadow p-5">
        <div class="mb-3 text-center">
            <p class="bg-white bg-gradient text-dark fs-3 text-center">Register Now</p>
        </div>
        <div class="p-3">
            @livewire('register-component')

        </div>
    </div>
@endsection
