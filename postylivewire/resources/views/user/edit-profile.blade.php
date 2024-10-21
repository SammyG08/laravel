@extends('layout.base')

@section('content')
    @livewire('edit-component', ['user' => $user])
@endsection
