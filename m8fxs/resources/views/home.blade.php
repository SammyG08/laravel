@extends('layouts.base')
@section('content')
    <section data-bs-version="5.1" class="menu menu6 cid-uuTi2FwIi6 container-fluid fixed-top" once="menu" id="menu06-5">


        <nav class="navbar navbar-expand-lg container">
            <div class="container-fluid pt-0 rounded-3">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="{{ route('home') }}#top">
                            <img src="../assets/images/mbr-96x96.png" alt="m8fxs logo" style="height: 3rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><span
                            class="navbar-caption text-black display-2 fs-2">m8fxs</span></span>
                </div>
                <button class="navbar-toggler border-0 shadow-none" type="button" data-toggle="collapse"
                    data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse opacityScrollOff " id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
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
                    </ul>

                    <div class="navbar-buttons mbr-section-btn">
                        @auth
                            @if (auth()->user()->id == 1)
                                <a class="btn btn-sm rounded-4 btn-dark display-6" href="{{ route('dashboard') }}"
                                    style="font-family: Arial, Helvetica, sans-serif;">Dashboard</a>
                            @endif
                            <a class="btn btn-sm btn-secondary rounded-4 display-6" href="{{ route('logout') }}"
                                style="font-family: Arial, Helvetica, sans-serif;">Logout</a>
                        @endauth
                        @guest
                            <a class="btn btn-sm rounded-4 btn-secondary display-3" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-sm btn-dark rounded-4 display-3" href="{{ route('register') }}">Sign up</a>
                        @endguest

                    </div>

                </div>
            </div>
        </nav>
    </section>
    <section data-bs-version="5.1" class="" id="headerSection">
        <div class="mbr-overlay" style="opacity: 0.7;"></div>

        <div class="container-fluid">
            <div class="row justify-content-center align-items-end">
                <div class="col-12 col-lg-7 mt-5" id="#introduction">
                    <div class="container introduction">
                        <h1 class="display-2 text-white"><strong>Welcome to
                                m8fxs.</strong></h1>

                        <p class="mbr-text mbr-fonts-style mbr-white display-7 fs-6">Get your High and Low Risk Slips from
                            The
                            No.1
                            Sports Prediction Guru</p>
                        <div class="mbr-section-btn mt-3">
                            <a class="btn btn-black btn-lg display-6 " href="{{ route('home') }}#freeTips">
                                Today's free tips
                            </a>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <main id="predictions" class="mt-5 mb-5">
        <div class="container">
            <div class="mx-auto row mt-5">
                <h6 class="text-center display-7 fs-2 fw-bold text-muted">PREDICTIONS</h6>
                <h6 class="display-7 fs-7 text-center text-muted">These predictions are made based on data analysed by
                    experts in our team</h6>
                <div class="col-12 col-lg-8">
                    <div class="container-fluid px-0">
                        @if ($previousFootballTickets->count() || $previousBasketballTickets->count())
                            <div class="col-12 d-flex justify-content-evenly">
                                <div class="mt-3 rounded-2 pb-1 d-flex flex-column align-items-center container-fluid "
                                    style="background-color:dimgray;">
                                    <div class="d-flex container-fluid justify-content-between align-items-center">
                                        <h5 class="display-7 fw-bold text-white">VIEW PREVIOUS TICKETS</h5>
                                        <button class="btn border-0 shadow-none button" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#previousTickets"
                                            aria-expanded="false" aria-controls="previousTickets"><i
                                                class="bi bi-caret-down-fill" id="showPreviousTickets"
                                                data-count=0></i></button>
                                    </div>
                                    @if ($previousFootballTickets->count())
                                        <div class="container-fluid collapse" id="previousTickets">
                                            <table class="table table-striped table-hover bg-white">
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
                                    @endif
                                    @if ($previousBasketballTickets->count())
                                        <div class="container-fluid collapse" id="previousTickets">
                                            <table class="table table-striped table-hover bg-white">
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
                                    @endif

                                </div>
                            </div>
                        @endif
                        <div class=" col-12 d-flex justify-content-evenly" id="freeTips">
                            <div class="mt-3 rounded-2 pb-1 d-flex flex-column align-items-center container-fluid "
                                style="background-color: cadetblue;">

                                <div class="d-flex container-fluid justify-content-between align-items-center">
                                    <h5 class="display-7 fw-bold text-white">FREE FOOTBALL ODDS</h5>
                                    <button class="btn border-0 shadow-none button" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#freeOdds" aria-expanded="false"
                                        aria-controls="freeOdds"><i class="bi bi-caret-down-fill" id="showBtn"
                                            data-count=0></i></button>
                                </div>
                                <div class="container-fluid collapse" id="freeOdds">
                                    <table class="table table-striped table-hover bg-white">
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
                                <div class="d-flex container-fluid justify-content-between align-items-center">
                                    <h5 class="display-7 fw-bold text-white">FREE BASKETBALL ODDS</h5>
                                    <button class="btn border-0 shadow-none button" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#bballOdds" aria-expanded="false"
                                        aria-controls="bballOdds"><i class="bi bi-caret-down-fill" id="showBballOdds"
                                            data-count=0></i></button>
                                </div>
                                <div class="container-fluid collapse" id="bballOdds">

                                    <table class="table table-striped bg-white table-hover">
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
                    </div>
                </div>

                <div class="col-12 col-lg-4 container-fluid popularLeagues">
                    <div class="card-body border-black">
                        <table class="table bg-white">
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
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><br><br>
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
