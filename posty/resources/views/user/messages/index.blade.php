@extends('layout.base')

@section('content')
    @livewire('chat-component', ['user' => $user])
@endsection
