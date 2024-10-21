@extends('layout.base')
@section('content')
    @if (session('message'))
        <div class=" container w-25  alert alert-dark">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <!-- <div class="container bg-transparent text-muted bg-gradient p-2 text-center fs-3 mb-4"></div> -->


    @livewire('post-component');
@endsection
