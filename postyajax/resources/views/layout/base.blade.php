<!DOCTYPE html>
<html lang="en" data-bs-theme='light'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <title>Posty</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="bg-body-secondary " style="overflow-y: hidden ">
    <div class="w-100">
        <div class="w-100 bg-white shadow-sm mb-5">
            <div class="d-flex p-2 flex-row bg-white bg-gradient justify-content-between">
                <div class="btn-group bg-transparent bg-gradient ">
                    <button class="btn btn-outline-light bg-light btn-md">
                        <a href="{{ route('post') }}"
                            class="fs-6 text-secondary text-decoration-none p-1 {{ request()->routeIs('post') ? 'fw-bold text-dark' : '' }}">Home</a>
                    </button>
                    <button class="btn btn-md bg-light btn-outline-light ">
                        <a href="{{ route('search') }} " id="send"
                            class=" text-decoration-none fs-6 p-1 text-secondary {{ request()->routeIs('search') ? 'fw-bold text-dark' : '' }}">Search</a>
                    </button>
                    <button class="btn btn-outline-light bg-light btn-md">
                        <a href="{{ route('chat') }}"
                            class="text-secondary text-decoration-none fs-6 p-1 {{ request()->routeIs('chat') ? 'fw-bold text-active' : '' }}">Chats</a>
                    </button>

                </div>
                <div class="btn-group bg-transparent bg-gradient">
                    @auth
                        <button class=" text-secondary btn btn-md btn-outline-light bg-light fs-6 p-2 ">
                            <a class = "text-decoration-none text-secondary"
                                href="{{ route('profile', auth()->user()->id) }}">{{ auth()->user()->name }}</a>
                        </button>
                        <form action="{{ route('logout') }}" method="post" class="fs-6 me-4 ">
                            @csrf
                            <button type="submit" class="text-secondary bg-light btn btn-outline-light p-2">Logout</button>
                        </form>
                    @endauth
                    @guest
                        <button class="btn btn-outline-light bg-light fs-6 btn-md">
                            <a href="{{ route('login') }}"
                                class=" text-secondary text-decoration-none p-1 {{ request()->routeIs('login') ? 'fw-bold text-dark' : '' }}">Login</a>
                        </button>
                        <button class="btn btn-md btn-outline-light bg-light fs-6 me-4">
                            <a href="{{ route('register') }}"
                                class="text-secondary text-decoration-none p-1 rounded {{ request()->routeIs('register') ? 'fw-bold text-dark' : '' }}">Register</a>
                        </button>
                    @endguest

                </div>
            </div>
        </div>
        <div class=""style="height:80vh;">
            @yield('content')
        </div>
    </div>
    @yield('script')
</body>

</html>
