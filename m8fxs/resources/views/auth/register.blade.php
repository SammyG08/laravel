@extends('layouts.base')
@section('content')
    <section data-bs-version="5.1" class="form03 cid-uuY0PPprQf container rounded-5 bg-white mb-5" id="form03-0">
        <div class="mx-auto mt-5 bg-white rounded-5 shadow-lg">
            <div class="container pt-3 pb-5 row d-flex justify-content-center align-items-start">
                <div class=" col-xl-6" id="soccerImage">
                    <div class="image-wrapper">
                        <img class="w-100 h-100" src="../assets/images/mbr-7.jpg" alt="m8fxs soccer image">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 item-wrapper ms-1">
                    <div class="mbr-section-head mb-5 text-center d-flex justify-content-between align-items-center">
                        <h5 class="mbr-section-title mbr-fonts-style mb-0 display-2">
                            <a href="{{ route('home') }}" class="text-decoration-none"><i
                                    class=" text-dark fs-2 bi bi-house-fill"></i></a>
                            {{-- <span class="fs-1 fw-bold display-1 " style="font-family:monospace">m8fxs</span> --}}
                        </h5>
                        <div class="pt-4 px-1 d-flex justify-content-center align-items-center">
                            <span class="fs-1 fw-bold display-2 ">m8fxs</span>

                            <a href="{{ route('home') }}">
                                <img src="../assets/images/mbr-96x96.png" alt="m8fxs logo" style="height: 3rem;">
                            </a>
                        </div>
                    </div>
                    <div class="container">
                        <p class="mbr-section-title mbr-fonts-style mb-5">
                            <span class="fw-bold fs-3 text-secondary">Sign Up To Join</span>
                        </p>
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
                                <label for="ageCheckBox" class="form-check-label flex-grow-1">I am 18 years and
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
