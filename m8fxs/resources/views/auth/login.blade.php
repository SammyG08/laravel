@extends('layouts.base')
@section('content')
    <section class="container" style="background-color: transparent !important;" id="loginSection">
        <div class="mt-5 mb-5 mx-auto d-flex justify-content-center align-items-center">
            <div class="container mt-5 mb-5 row wholeImageAndFormContainer" style="height: 100vh;">
                <div class="col-12 col-xl-6 d-xl-flex justify-content-center align-items-center" id="soccerImage">
                    <img class="w-100" src="../assets/images/mbr.png" alt="m8fxs soccer image">
                </div>
                <div class="col-12 col-xl-6 bg-white d-flex flex-column justify-content-center align-items-center shadow-lg formContainer"
                    style="border-radius: 25px !important;">
                    <div class="container d-flex justify-content-evenly align-items-center formIcons">
                        <div class="homeNav">
                            <h3 class="">
                                <a href="{{ route('home') }}" class="text-decoration-none text-dark fs-2"><i
                                        class="bi bi-house-fill"></i></a>
                            </h3>
                        </div>
                        <div class="">
                            <h3 class="display-2">
                                m8fxs
                            </h3>
                        </div>
                        <div class="">
                            <img src="../assets/images/mbr-96x96.png" alt="logo" class="rounded-circle img-fluid"
                                style="height: 3rem">
                        </div>

                    </div>
                    <div class="text-secondary">
                        <h4 class="fs-4 fw-bold mt-3">Log In To Your Account</h4>
                    </div>
                    <div class="text-dark mt-5">
                        <form action="{{ route('login') }}" class=" form-group" method="post">
                            @csrf
                            <div class="col-12 mb-4">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" name="email" id="email" class="form-control shadow-sm"
                                    placeholder="Eg. johndoe@example.com" required>
                            </div>
                            @error('email')
                                <div class="col-12 mb-4">
                                    <span class="fs-4 text-warning">{{ $message }}</span>
                                </div>
                            @enderror
                            <div class="col-12 mb-4">
                                <label for="password" class="form-label">Your Password</label>
                                <input type="password" name="password" id="password" class="form-control shadow-sm"
                                    placeholder="****************" required>
                            </div>
                            @error('password')
                                <div class="col-12 mb-4">
                                    <span class="fs-4 text-warning">{{ $message }}</span>
                                </div>
                            @enderror
                            <div class="col-12 mb-4 d-grid">
                                <button class="btn btn-block btn-success fw-bold">Log In</button>
                            </div>
                        </form>
                        <p class="mb-2">
                            <span class=" fs-7 text-dark">Don't have an account?</span>
                        </p>
                        <p class=" mb-5">
                            <a href="{{ route('register') }}" class="fw-bold fs-7 text-muted">Create One Here</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
