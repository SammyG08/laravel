<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @vite('resources/css/app.css') -->
    <title>Posty</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .auto-close{
            animation-name:success;
            animation-duration: 2s;
        }
        @keyframes success {
            from{display: table;}
            to{display: hidden;}
        }
    </style>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</head>
<body class="bg-light ">
    <div class="w-100">
        <div class="w-100 bg-white shadow-sm mb-5">
            <div class="d-flex p-2 flex-row bg-white bg-gradient justify-content-between">
                <div class="btn-group bg-transparent bg-gradient ">
                    <button class="btn btn-outline-light bg-light btn-md">
                        <a href="{{route('post')}}" class="fs-6 text-secondary text-decoration-none p-1 {{request()->routeIs('post') ? 'fw-bold text-dark' : ''}}">Home</a>
                    </button>
                    <button class="btn btn-md bg-light btn-outline-light ">
                        <a href="{{route('search')}}" class=" text-decoration-none fs-6 p-1 text-secondary {{request()->routeIs('search') ? 'fw-bold text-dark' : ''}}">Search</a>
                    </button>
                    <button class="btn btn-outline-light bg-light btn-md">
                        <a href="{{route('dashboard')}}" class="text-secondary text-decoration-none fs-6 p-1 {{request()->routeIs('dashboard') ? 'fw-bold text-dark' : ''}}">Dashboard</a>
                    </button>
                  
                </div>
                <div class="btn-group bg-transparent bg-gradient">
                    @auth
                    <button class=" text-secondary btn btn-md btn-outline-light bg-light fs-6 pe-3 ">{{auth()->user()->name}}</button>
                    <form action="{{route('logout')}}" method="post" class="fs-6 ">
                        @csrf
                        <button type="submit" class="text-secondary bg-light btn btn-outline-light p-2">Logout</button>
                    </form>
                    @endauth
                    @guest
                    <button class="btn btn-outline-light bg-light fs-6 btn-md">
                        <a href="{{route('login')}}" class=" text-secondary text-decoration-none p-1 {{request()->routeIs('login') ? 'fw-bold text-dark' : ''}}">Login</a>
                    </button>
                    <button class="btn btn-md btn-outline-light bg-light fs-6">
                        <a href="{{route('register')}}" class="text-secondary text-decoration-none p-1 {{request()->routeIs('register') ? 'fw-bold text-dark' : ''}}">Register</a>
                    </button>
                    @endguest
                    
                </div>
            </div>
        </div>
       
        @yield('content')
       
    </div>
    
</body>
</html>