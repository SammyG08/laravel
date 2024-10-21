@extends('layout.base')

@section('content')
    @livewire('comment-component', ['post' => $post])
@endsection
