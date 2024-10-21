@extends('layout.base')
@section('content')

<div class=" w-25 container-fluid bg-gradient rounded-3 border-1 text-dark bg-white bg-gradient shadow p-5">
    <div class="p-3">
        <div class="container text-center fs-5">Login</div>
        @if (session('status'))
            <div class="container text-warning text-center p-2 fs-6">{{session('status')}}</div>
        @endif
        <form action="{{ route('login')}}" method = "post" class="form-group mb-3 ">
            @csrf
            <label for="email" class="form-label"></label>
            <input type="email" name="email" class="form-control p-2 @error('email') border border-danger border-2 @enderror" placeholder="Your email" value="{{old('email')}}">
            @error('email')
                <div class="text-danger p-1">{{$message}}</div>
            @enderror
            <label for="password" class="form-label"></label> 
            <input type="password" name="password" class="form-control p-2 @error('password') border border-danger border-2 @enderror" placeholder="Your password">
            @error('password')
                <div class="text-danger p-1">{{$message}}</div>
            @enderror
            <div class="form-check mt-3 fst-normal"><label for = "remember" class="form-check-label"><input type="checkbox" name = "remember" id="remember" class="form-check-input">Remember me</label></div>
            <div class="container-fluid btn-group p-2"><button class="btn btn-primary btn-block rounded mt-1" type="submit">Login</button></div>
            
        </form>
    </div>
</div>

@endsection