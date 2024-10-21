@props(['post'])

<livewire:like-component :$post :key="str()->random(1000)" />


{{-- @livewire('like-component', ['post' => $post]) --}}
