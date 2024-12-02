@extends('layouts.base')
@section('content')
    <section class="container" style=" background-color: transparent !important;" id="registerSection;">
        <div class="pt-5 pb-5 mx-auto d-flex justify-content-center align-items-center">
            <div class="container row wholeImageAndFormContainer">
                <div class="col-12 col-xl-6 d-xl-flex justify-content-center align-items-center" id="stadiumImage">
                    <img class="" src="../assets/images/mbr-7.jpg" alt="m8fxs soccer image">
                </div>
                <div class="col-12 col-xl-6 bg-white shadow-lg pt-5 formContainer"
                    style="border-radius: 25px !important; height: 100% !important">
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
                        <h4 class="fs-4 fw-bold mt-3">Sign Up to Join Us Today!</h4>
                    </div>
                    <div class="text-dark mt-5">
                        <form action="{{ route('register') }}" class=" form-group" method="post">
                            @csrf
                            <div class="col-12 mb-4  @error('fullName') border border-danger border-2 mb-1 @enderror">
                                <label for="fullName" class="form-label">Your Full Name</label>
                                <input type="fullName" name="fullName" id="fullName" class="form-control shadow-sm"
                                    placeholder="Eg. Lionel Messi" required>
                            </div>
                            @error('fullName')
                                <div class="col-12 mb-4">
                                    <small class="fs-6 text-danger">{{ $message }}</small>
                                </div>
                            @enderror

                            <div class="col-12 mb-4  @error('email') border border-danger border-2 mb-1 @enderror">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" name="email" id="email" class="form-control shadow-sm"
                                    placeholder="Eg. johndoe@example.com" required>
                            </div>
                            @error('email')
                                <div class="col-12 mb-4">
                                    <small class="fs-6 text-danger">{{ $message }}</s>
                                </div>
                            @enderror
                            <div class="col-12 mb-4  @error('password') border border-danger border-2 mb-1 @enderror">
                                <label for="password" class="form-label">Your Password</label>
                                <input type="password" name="password" id="password" class="form-control shadow-sm"
                                    placeholder="Your Password" required>
                            </div>
                            @error('password')
                                <div class="col-12 mb-4">
                                    <small class="fs-6 text-danger">{{ $message }}</small>
                                </div>
                            @enderror
                            <div class="col-12
                                    mb-4">
                                <label for="password_confirmation" class="form-label">Repeat Your Password</label>
                                <input type="password" name="password_confirmation" class="form-control shadow-sm"
                                    placeholder="Confirm Password" required>
                            </div>
                            <div class="col-8 mb-4 form-check d-flex justify-content-between">
                                <div class="col-2">
                                    <input type="checkbox" name="ageCheckBox" id="ageCheck" class="form-check" required>
                                </div>
                                <label for="ageCheckBox" class="col-6 form-check-label flex-grow-1">I am 18 years and
                                    above</label>
                            </div>
                            @error('checkBox')
                                <div class="col-12 mb-4">
                                    <small class="fs-6 text-danger">{{ $message }}</small>
                                </div>
                            @enderror
                            <div class="col-12 mb-4 d-grid">
                                <button class="btn btn-block btn-success fw-bold">Submit</button>
                            </div>
                        </form>
                        <p class="mb-2">
                            <span class=" fs-7 text-dark">Already have an account?</span>
                        </p>
                        <p class=" mb-5">
                            <a href="{{ route('login') }}" class="fw-bold fs-7 text-muted">Log In Here</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
