@extends('layouts.base')
@section('content')
    <main>



        <nav class="navbar container-fluid navbar-light bg-white ">
            <div class="container-fluid pt-0 rounded-3 col-12 d-md-flex justify-content-between align-items-center">
                <div class="navbar-brand mx-auto d-flex justify-content-center ">
                    <span class="navbar-logo">
                        <img src="../assets/images/mbr-96x96.png" alt="m8fxs logo" style="height: 3rem;">
                    </span>
                    <span class="navbar-caption-wrap"><span
                            class="navbar-caption text-black display-2 fs-1">m8fxs</span></span>
                </div>
                <div class="navbar-buttons mx-auto mbr-section-btn" id="navbarSupportedContent">
                    <div class="d-flex justify-content-center align-items-center">
                        <a class="btn btn-sm btn-dark rounded-4 display-3 border-0" href="{{ route('football') }}">Add
                            football
                            ticket</a>
                        <a class="btn btn-sm btn-dark rounded-4 display-3 border-0" href="{{ route('basketball') }}">Add
                            basketball
                            ticket</a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="section" style="background-color: transparent;">
            @if (session()->has('message'))
                <div class="container text-dark">
                    <div class=" mx-auto alert alert-warning alert-dismissible fade show d-flex justify-content-between"
                        role="alert">
                        <span class="fs-6 text-warning"> {{ session('message') }} </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
                <div class="text-secondary">
                    <h3 class="display-4 fw-bold fs-4">ADD NEW FOOTBALL TICKET</h3>
                </div>
                <div class="pagetitle text-center pt-2 align-self-center">
                    <nav>
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item fs-6"><a href="{{ route('home') }}"
                                    class="text-decoration-none text-dark">Home</a>
                            </li>
                            <li class="breadcrumb-item fs-6 text-dark">Login</li>
                            <li class="breadcrumb-item fs-6 text-dark">Dashboard</li>

                        </ol>
                    </nav>
                </div>
                <div class="container pb-5 pt-3 rounded-5" style="background-color: transparent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mx-5 px-3" style="background-color:transparent">
                                <div class="card-title">
                                    <div class="container d-flex justify-content-center align-items-center pt-3">
                                        <h5 class="card-title text-muted fs-4">Fill the respective categories to save in
                                            database</h5>
                                    </div>
                                </div>
                                <div class="card-body pd-5">
                                    <!-- Floating Labels Form -->
                                    <form class="row g-3 pb-3" style="background-color:gainsboro"
                                        action="{{ route('football') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control shadow-sm border-0"
                                                    id="footballLeague" name="LEAGUE" placeholder="LEAGUE" required>
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
                                                <input class="form-control shadow-sm border-0" placeholder="SELECTION"
                                                    id="selection" name="SELECTION"" required></input>
                                                <label for=" selection">SELECTION</label>
                                            </div>
                                        </div>
                                        <div class="col-12 d-md-flex align-items-center">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control shadow-sm border-0"
                                                        id="result" name="RESULT" placeholder="RESULT">
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>




    </main>
@endsection
