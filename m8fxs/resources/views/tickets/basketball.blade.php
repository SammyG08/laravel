@extends('layouts.base')
@section('content')
    <main>
        <div class="pagetitle text-center pt-2 align-self-center">
            <nav>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item fs-6"><a href="{{ route('home') }}"
                            class="text-dark text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item fs-6">Login</li>
                    <li class="breadcrumb-item fs-6"><a href="{{ route('dashboard') }}"
                            class="text-dark text-decoration-none">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item fs-6">Add Basketball Ticket</li>

                </ol>
            </nav>
        </div>
        <div class="row mb-5" style="height: 100vh;">
            @if (session()->has('message'))
                <div class="container mt-3 bg-dark p-2">
                    <div class="mx-auto text-center d-flex justify-content-center align-items-center mb-3">
                        <span class=" fs-3 text-success"> {{ session('message') }} </span>
                    </div>
                </div>
            @endif

            <div class="col-lg-6 col-12 me-0 bg-primary ps-0 pe-0">
                <img src="../assets/images/mbr-1-1256x837.jpg" alt="working-image" class="img-fluid"
                    style="height: 100%; width: 100%;">
            </div>
            <div class="ps-0 col-lg-6 col-12 bg-dark">
                <div class="card mx-5 px-3 pb-5" style="background-color:transparent">
                    <div class="card-title">
                        <div class="container d-flex justify-content-center align-items-center pt-3">
                            <h5 class="card-title text-white fs-4">Add Basketball Ticket</h5>
                        </div>
                        <div class="container d-flex justify-content-center align-items-center pt-3">
                            <h5 class="card-title text-secondary fs-4">Fill the respective categories to save in
                                database</h5>
                        </div>
                    </div>
                    <div class="card-body pd-5">
                        <!-- Floating Labels Form -->
                        <form class="row g-3 pb-3" style="background-color:gainsboro" action="{{ route('basketball') }}"
                            method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control shadow-sm border-0" id="basketballLeague"
                                        name="LEAGUE" placeholder="LEAGUE" required>
                                    <label for="basketballLeague">LEAGUE</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control shadow-sm border-0" id="homeTeam"
                                        name="HOMETEAM" placeholder="HOME TEAM" required>
                                    <label for="homeTeam">HOME TEAM</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control shadow-sm border-0" id="awayTeam"
                                        name="AWAYTEAM" placeholder="AWAY TEAM" required>
                                    <label for="awayTeam">AWAY TEAM</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input class="form-control shadow-sm border-0" placeholder="SELECTION" id="selection"
                                        name="SELECTION"" required></input>
                                    <label for=" selection">SELECTION</label>
                                </div>
                            </div>
                            <div class="col-12 d-md-flex align-items-center">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control shadow-sm border-0" id="result"
                                            name="RESULT" placeholder="RESULT">
                                        <label for="result">RESULT</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-evenly col-md-6 col-sm-12 align-item-center"
                                    id="adminControls">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                    <div class="mt-5 card-footer text-center">
                        <span class="text-dark display-2 fs-3">You have only failed once you give up!</span>
                    </div>
                </div>

            </div>
            <section data-bs-version="5.1" class="footer3 cid-uuTf6QQE8m" once="footers" id="footer3-4">
                <div class="container-fluid">
                    <div class="media-container-row align-center mbr-white d-flex align-items-center">
                        <div class="row row-copirayt">
                            <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                                © Copyright 2025. All Rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
    </main>
@endsection
