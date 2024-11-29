@extends('layouts.base')
@section('content')
    <section data-bs-version="5.1"
        class="form03 cid-uuY0PPprQf container rounded-4 mb-5 d-flex justify-content-center align-items-center"
        style="height: 90vh; background-color:rgba(0, 0, 0, 0)" id="form03-0">
        <div class="container">
            @if (session()->has('status'))
                <div class="mx-auto">
                    <div class=" mx-auto alert alert-warning alert-dismissible fade show d-flex justify-content-between"
                        role="alert">
                        <span class="fs-6 text-warning"> <?php echo session('status'); ?> </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="mx-auto rounded-5 shadow-lg mt-5 bg-white">
                <div class="container pt-3 pb-5 row d-flex justify-content-center align-items-start">
                    <div class=" col-xl-6" id="soccerImage">
                        <div class="image-wrapper">
                            <img class="w-100" src="../assets/images/mbr.png" alt="m8fxs soccer image">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 item-wrapper ms-1">
                        <div class="mbr-section-head mb-5 text-center d-flex justify-content-between align-items-center">
                            <h5 class="mbr-section-title mbr-fonts-style mb-0 display-2">
                                <a href="{{ route('home') }}" class="text-decoration-none"><i
                                        class=" text-dark fs-2 bi bi-house-fill"></i></a>
                                {{-- <span class="fs-1 fw-bold display-1 " style="font-family:monospace">m8fxs</span> --}}
                            </h5>
                            <div class="pt-4 px-1 d-flex justify-content-between align-items-center">
                                <span class="fs-1 fw-bold display-2 ">m8fxs</span>

                                <a href="{{ route('home') }}">
                                    <img src="../assets/images/mbr-96x96.png" alt="m8fxs logo" style="height: 3rem;">
                                </a>
                            </div>
                        </div>
                        <div class="container">
                            <p class="mbr-section-title mbr-fonts-style mb-5">
                                <span class="fw-bold fs-3 text-secondary">Log In To Your Account</span>
                            </p>
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
        </div>

    </section>
@endsection
