<x-mail::message>
Your post was liked by {{$liker->name}}

<x-mail::button :url="route('post.index', $post)">
    View Post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
