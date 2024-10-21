@extends('layout.base')

@section('content')
    @livewire('reply-comment-component', ['comment' => $comment])
@endsection
