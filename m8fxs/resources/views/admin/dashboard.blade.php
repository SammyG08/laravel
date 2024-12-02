@extends('layouts.base')
@section('content')
    <main>
        <div class="row bg-light">
            <div class="col-12">
                <nav class="container col-12 col-md-8 navbar bg-light navbar-light">
                    <div class="col-12 mx-auto row ">
                        <div class="col-1 d-flex align-items-center ps-0  pe-1">
                            <img src="../assets/images/mbr-96x96.png" alt="m8fxs logo" style="height:3rem; width:3rem;"
                                class="rounded-circle">
                        </div>
                        <div class="col-5 d-flex align-items-center justify-content-start">
                            <span class="navbar-caption-wrap text-black display-2 fs-1 siteName">m8fxs</span>
                        </div>

                        <div class="col-6 d-flex justify-content-end pe-1 pt-1">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsibleNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <div style="background-color:cadetblue" class=" collapse navbar-collapse" id="collapsibleNavbar">

            <div class="col-12 container ">
                <div class="mx-auto container ">
                    <div class="row mx-auto">
                        <div class="col-6 d-flex justify-content-center">
                            <ul class=" navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-light text-white px-2"
                                        href="{{ route('football') }}">New
                                        Football
                                        Ticket</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <ul class=" navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-light text-white px-2"
                                        href="{{ route('basketball') }}">New
                                        Basketball
                                        Ticket</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <div class="row mb-5" style="height: 100vh;">
            @if (session()->has('message'))
                <div class="container mt-3 bg-dark">

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
                            <h5 class="card-title text-muted fs-4">
                                <a href="{{ route('home') }}" class="text-decoration-none text-muted me-1">Home</a><i
                                    class="me-1 bi bi-caret-right-fill"></i>
                                <a href="{{ route('dashboard') }}" class="text-muted h-5 text-decoration-none">Dashboard</a>
                            </h5>
                        </div>
                        <div class="container d-flex justify-content-center align-items-center pt-3">
                            <h5 class="card-title text-white fs-4">ADD NEW FOOTBALL TICKET
                        </div>
                        <div class="container d-flex justify-content-center align-items-center pt-3">
                            <h5 class="card-title text-secondary fs-4">Fill the respective categories to save in
                                database</h5>
                        </div>
                    </div>
                    <div class="card-body pd-5">
                        <!-- Floating Labels Form -->
                        <form class="row g-3 pb-3" style="background-color:gainsboro" action="{{ route('football') }}"
                            method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control shadow-sm border-0" id="footballLeague"
                                        name="LEAGUE" placeholder="LEAGUE" required>
                                    <label for="footballLeague">LEAGUE</label>
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
