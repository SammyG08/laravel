@extends('layouts.base')
@section('content')
    <div class="row bg-dark" style="background-color:rgba(0, 0, 0, 1);">
        <div class="col-12" style="background-color:rgba(0, 0, 0, 1);">
            <nav class="container col-12 navbar navbar-dark bg-black" style="background-color:rgba(0, 0, 0, 0.5);">
                <div class="col-12 row ">
                    <div class="col-2 d-flex justify-content-end align-items-center ps-0 pe-1">
                        <img src="../assets/images/mbr-96x96.png" alt="m8fxs logo" style="height:3rem; width:3rem;"
                            class="rounded-circle">
                    </div>
                    <div class="col-5 d-flex align-items-center justify-content-start">
                        <span class="navbar-caption-wrap text-white display-2 fs-1 siteName">m8fxs</span>
                    </div>

                    <div class="col-5 d-flex justify-content-end pe-1 pt-1 text-end">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                </div>
                <div class="col-12 collapse navbar-collapse" id="collapsibleNavbar">
                    <div class="bg-dark">
                        <ul class="container navbar-nav d-flex flex-row justify-content-around align-items-center"
                            id="navItems">
                            <li class="nav-item">
                                <a class="nav-link link text-info fs-6 display-5 fw-bold"
                                    href="{{ route('home') }}#top">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link text-muted fs-6 display-5"
                                    href="{{ route('home') }}#predictions">PREDICTIONS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link text-muted fs-6  display-5"
                                    href="{{ route('home') }}#contacts1-2">CONTACT
                                    US</a>
                            </li>
                            @auth
                                @if (auth()->user()->id == 1)
                                    <li class="navbar-text">
                                        <a class="nav-link btn btn-sm btn-outline-light text-white bg-secondary text-dark fs-7 navBtn text-decoration-none px-1"
                                            href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                @endif
                                <li class="navbar-text">
                                    <a class="nav-link btn btn btn-outline-light text-white bg-secondary fs-7 navBtn text-decoration-none px-2"
                                        href="{{ route('logout') }}">Logout</a>
                                </li>
                            @endauth
                            @guest
                                <li class="navbar-text">
                                    <a class=" nav-link btn btn-outline-light text-white bg-secondary fs-7 navBtn text-decoration-none px-3"
                                        href="{{ route('login') }}">Log
                                        In</a>
                                </li>
                                <li class="navbar-text">
                                    <a class=" nav-link btn btn-outline-light bg-secondary text-white fs-7 navBtn text-decoration-none px-2"
                                        href="{{ route('register') }}">Sign
                                        Up</a>
                                </li>
                            @endguest

                        </ul>


                    </div>
                </div>
            </nav>
        </div>
    </div>
    <section data-bs-version="5.1" class="" id="headerSection">
        <div class=" row bg-dark">
            <div class="col-12 pe-1 imageHeader">
                <div class="card text-white text-center bg-dark">
                    <img src="../images/altsoccer.jpg" alt="" class="football image card-img"
                        style="height:100%; width:100%;">
                    <div class="card-img-overlay theOverlay d-sm-flex justify-content-start align-items-center textContainer"
                        style="background-color: rgba(0, 0, 0, 0.5)">
                        <div class="card-body ">
                            <h1 class="text-white display-2 fw-bold fs-1 h-1 welcomeText"><strong>Welcome to
                                    m8fxs.</strong></h1>
                            <p class="mbr-text mbr-fonts-style mbr-white card-text display-7 fs-7 directionText">Get your
                                High and Low
                                Risk
                                Slips
                                from
                                The
                                No.1
                                Sports Prediction Guru
                            </p>
                            <a class="btn btn-dark display-6 freeTipsBtn" href="{{ route('home') }}#freeTips">
                                Free tips
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <main id="predictions" class="mt-0 mb-5 container">
        <div class=" mx-auto row mt-5">
            <h6 class="text-center display-7 fs-2 fw-bold text-secondary">PREDICTIONS</h6>
            <h6 class="display-7 fs-7 text-center text-muted">These predictions are made based on data analysed by
                experts in our team</h6>
            <div class="col-12 col-lg-8">
                @if ($previousFootballTickets->count() || $previousBasketballTickets->count())
                    <div class="col-12 ">
                        <div class="col-12 ps-1 mt-3 rounded-2 pb-1 d-flex flex-column align-items-center"
                            style="background-color:dimgray;">
                            <div class=" col-12 d-flex justify-content-between align-items-center">
                                <h5 class="display-7 fw-bold text-white">VIEW PREVIOUS TICKETS</h5>
                                <button class="btn border-0 shadow-none button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#previousTickets" aria-expanded="false"
                                    aria-controls="previousTickets"><i class="bi bi-caret-down-fill"
                                        id="showPreviousTickets" data-count=0></i></button>
                            </div>
                        </div>
                    </div>
                    @if ($previousFootballTickets->count())
                        <div class="col-12">
                            <div class="col-12 table-responsive collapse" id="previousTickets">
                                <table class="col-12 table table-striped table-hover bg-white">
                                    <tr class="table-row">
                                        <th class="table-head">League</th>
                                        <th class="table-head">Teams</th>
                                        <th class="table-head">Selection</th>
                                        <th class="table-head">Result</th>
                                    </tr>


                                    @foreach ($previousFootballTickets as $footballTicket)
                                        <tr class="table-row">
                                            <td class="table-data">{{ $footballTicket->league }}</td>
                                            <td class="table-data">{{ $footballTicket->homeTeam }} vs
                                                {{ $footballTicket->awayTeam }}</td>
                                            <td class="table-data">{{ $footballTicket->selection }}</td>
                                            <td class="table-data">{{ $footballTicket->result }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                    @if ($previousBasketballTickets->count())
                        <div class="col-12">
                            <div class="col-12 table-responsive collapse" id="previousTickets">
                                <table class="col-12 table table-striped table-hover bg-white">
                                    <tr class="table-row">
                                        <th class="table-head">League</th>
                                        <th class="table-head">Teams</th>
                                        <th class="table-head">Selection</th>
                                        <th class="table-head">Result</th>
                                    </tr>


                                    @foreach ($previousBasketballTickets as $basketballTicket)
                                        <tr class="table-row">
                                            <td class="table-data">{{ $basketballTicket->league }}</td>
                                            <td class="table-data">{{ $basketballTicket->homeTeam }} vs
                                                {{ $basketballTicket->awayTeam }}</td>
                                            <td class="table-data">{{ $basketballTicket->selection }}</td>
                                            <td class="table-data">{{ $basketballTicket->result }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                @endif
                <div class="col-12 " id="freeTips">
                    <div class="col-12 ps-1 mt-3 rounded-2 pb-1 d-flex flex-column align-items-center"
                        style="background-color:cadetblue;">
                        <div class=" col-12 d-flex justify-content-between align-items-center">
                            <h5 class="display-7 fw-bold text-white">FOOTBALL ODDS</h5>
                            <button class="btn border-0 shadow-none button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#freeOdds" aria-expanded="false" aria-controls="freeOdds"><i
                                    class="bi bi-caret-down-fill" id="showBtn" data-count=0></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12 table-responsive collapse" id="freeOdds">
                        <table class="col-12 table table-striped table-hover bg-white">
                            <tr class="table-row">
                                <th class="table-head">League</th>
                                <th class="table-head">Teams</th>
                                <th class="table-head">Selection</th>
                                <th class="table-head">Result</th>
                            </tr>
                            @if ($predictions->count())
                                @foreach ($predictions as $prediction)
                                    <tr class="table-row">
                                        <td class="table-data">{{ $prediction->league }}</td>
                                        <td class="table-data">{{ $prediction->homeTeam }} vs
                                            {{ $prediction->awayTeam }}</td>
                                        <td class="table-data">{{ $prediction->selection }}</td>
                                        <td class="table-data">{{ $prediction->result }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="table-row">
                                    <td class="table-data">-</td>
                                    <td class="table-data">-</td>
                                    <td class="table-data">-</td>
                                    <td class="table-data">-</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="col-12 ps-1 mt-3 rounded-2 pb-1 d-flex flex-column align-items-center"
                        style="background-color:cadetblue;">
                        <div class=" col-12 d-flex justify-content-between align-items-center">
                            <h5 class="display-7 fw-bold text-white">BASKETBALL ODDS</h5>
                            <button class="btn border-0 shadow-none button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#bballOdds" aria-expanded="false" aria-controls="bballOdds"><i
                                    class="bi bi-caret-down-fill" id="showBballOdds" data-count=0></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="col-12 table-responsive collapse" id="bballOdds">
                        <table class="col-12 table table-striped table-hover bg-white">
                            <tr class="table-row">
                                <th class="table-head">League</th>
                                <th class="table-head">Teams</th>
                                <th class="table-head">Selection</th>
                                <th class="table-head">Result</th>
                            </tr>
                            @if ($basketballPredictions->count())
                                @foreach ($basketballPredictions as $bballPrediction)
                                    <tr class="table-row">
                                        <td class="table-data">{{ $bballPrediction->league }}</td>
                                        <td class="table-data">{{ $bballPrediction->homeTeam }} vs
                                            {{ $bballPrediction->awayTeam }}</td>
                                        <td class="table-data">{{ $bballPrediction->selection }}</td>
                                        <td class="table-data">{{ $bballPrediction->result }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="table-row">
                                    <td class="table-data">-</td>
                                    <td class="table-data">-</td>
                                    <td class="table-data">-</td>
                                    <td class="table-data">-</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 container-fluid popularLeagues">
                <div class="card-body border-black">
                    <table class="table table-responsive-sm bg-white">
                        <tr class="">
                            <th class="bg-dark text-white">Popular leagues</th>
                        </tr>
                        <tr class="">
                            <td class=""> English Premier League</td>
                        </tr>
                        <tr>
                            <td class="">Spanish Laliga</td>
                        </tr>
                        <tr>
                            <td class="">German Bundesliga</td>
                        </tr>
                        <tr>
                            <td class="">French Ligue 1</td>
                        </tr>
                        <tr>
                            <td class="">Netherlands Eredivise</td>
                        </tr>
                        <tr>
                            <td class="">Italian Serie A</td>
                        </tr>
                        <tr>
                            <td class="">Scotland Premiership</td>
                        </tr>
                        <tr>
                            <td class="">Turkey Super Lig</td>
                        </tr>
                        <tr>
                            <td class="">Portugal Primeira Liga</td>
                        </tr>
                        <tr>
                            <td class="">UEFA Champions League</td>
                        </tr>
                        <tr>
                            <td class="">UEFA Europa League</td>
                        </tr>
                    </table>
                </div>

                <div class="card" style="background-color:thistle">
                    <span class="card-header bg-info text-white">Tipster Advice</span>
                    <div class="card-body text-white">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><br><br>
                        <p class="fs-6 display-7 text-dark">To all clients, reduce your bet addiction. Everything we do
                            here is with data analysis, my own intelligence, experience and instincts. m8fxs.com is for
                            persons with age 18+ Only! BET RESPONSIBLY!! Thank you.<br><br>@mason</p>
                    </div>
                </div>
            </div>


        </div>
        </div>

    </main>

    <section data-bs-version="5.1" class="contacts1 cid-uuT8YlPetB bg-dark rounded-0 mt-5" id="contacts1-2">
        <div class="container text-white">
            <div class="mbr-section-head">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-6"><strong>Contact Us</strong>
                </h3>
                <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-7">Get in touch with us
                </h4>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="card col-12 col-lg-5 bg-light me-2">
                    <div class="card-wrapper">
                        <div class="card-box align-center">
                            <div class="image-wrapper">
                                <span class="mbr-iconfont mobi-mbri-letter mobi-mbri"
                                    style="color: rgb(187, 187, 187); fill: rgb(187, 187, 187);"></span>
                            </div>
                            <h4 class="card-title mbr-fonts-style mb-2 display-7">Email</h4>
                            <p class="mbr-text mbr-fonts-style mb-2 display-6 fs-6 text-dark">
                                We will reply as soon as possible</p>
                            <h5 class="link mbr-fonts-style display-7 text-dark">m8fxs@gmail.com</h5>
                        </div>
                    </div>
                </div>
                <div class="card col-12 col-lg-5 bg-light">
                    <div class="card-wrapper bg-light">
                        <div class="card-box align-center">
                            <div class="image-wrapper">
                                <span class="mbr-iconfont mobi-mbri-mobile-2 mobi-mbri"
                                    style="color: rgb(187, 187, 187); fill: rgb(187, 187, 187);"></span>
                            </div>
                            <h4 class="card-title mbr-fonts-style align-center mb-2 display-7">Phone</h4>
                            <p class="mbr-text mbr-fonts-style mb-2 display-6 fs-6 text-dark">
                                Mon - Fri 09:00 - 18:00</p>
                            <h5 class="link mbr-black mbr-fonts-style display-7 fs-6 text-dark">+233 302-342-885</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="footer3 cid-uuTf6QQE8m" once="footers" id="footer3-4">
        <div class="container-fluid">
            <div class="media-container-row align-center mbr-white">
                <div class="row row-copirayt">
                    <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                        © Copyright 2025. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <input name="animation" type="hidden">
@endsection
