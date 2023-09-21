@extends('layouts.app')
@section('title', 'Indosat Webinar')
@section('content')
{{-- <nav class="navbar navbar-expand-lg inner-nav navbar-dark fixed-top py-3" id="mainNav">
            <div class="container-fluid">
                <a class="navbar-brand " id="main_lv_logo">
                    <img src="/assets/teachers/lifevitae_logo.png" style="display: none;">
                </a>
                <div class="d-flex">
                    <div class="dropdown language-selector language-inmobile mt-1">
                        <a href="#" class="dropdown-toggle language_navigation" data-toggle="dropdown" data-close-others="true" aria-expanded="true">
                            English
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="https://lifevitaelive.com/change_language/1">
                                    <span id="js_language">Bahasa (Indonesia)</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="https://lifevitaelive.com/change_language/2">
                                    <span id="js_language">English</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="dropdown language-selector ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true" aria-expanded="true">
                                English
                            </a>
                            <ul class="dropdown-menu pull-right ">
                                <li>
                                    <a href="https://lifevitaelive.com/change_language/1">
                                        <span id="js_language">Bahasa (Indonesia)</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="https://lifevitaelive.com/change_language/2">
                                        <span id="js_language">English</span>
                                    </a>
                                </li></ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> --}}

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a class="navbar-brand" id="main_lv_logo">
        <img src="/assets/indosat/lifevitae_purple.png">
    </a>
    <a href="#">
        <div class="nav_card">
            <img src="/assets/indosat/icon_express.png">
            {{-- <img src="/assets/indosat/icon_express_active.png"> --}}
        </div>
        <span class="nav-text">Express</span>
    </a>
    <a href="#">
        <div class="nav_card">
            <img src="/assets/indosat/icon_webinar.png">
            {{-- <img src="/assets/indosat/icon_webinar_active.png"> --}}
        </div>
        <span class="nav-text">Webinar</span>
    </a>
    <a href="#">
        <div class="nav_card">
            <img src="/assets/indosat/icon_certificate.png">
            {{-- <img src="/assets/indosat/icon_certificate_active.png"> --}}
        </div>
        <span class="nav-text">Certificate</span>
    </a>
</div>

<div id="main">
    <button class="openbtn" onclick="openNav()">
        <i class="fas fa-align-left"></i>
    </button>

    <section class="webinar sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="row gx-lg-0 gy-4">
                <div class="col-lg-12">
                    <div class="section-header upper">
                        <h1>Welcome <span class="aboard">aboard!</span></h1>
                    </div>
                    <p>This platform grants you the opportunity to select the webinar of your choice for participation.</p>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="box credits purple">
                        <span>Available Credits</span>
                        <h2>01</h2>
                        <img src="/assets/indosat/creditw.png">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box credits">
                        <span>Used Credits</span>
                        <h2>00</h2>
                        <img src="/assets/indosat/creditp.png">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box credits">
                        <span>Expired Credits</span>
                        <h2>00</h2>
                        <img src="/assets/indosat/creditp.png">
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h2>Here are the webinars that you can redeem</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box web-img">
                        <img src="/assets/indosat/webinar_rec.png">
                        <p>Webinar Title:</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box web-img">
                        <img src="/assets/indosat/webinar_rec.png">
                        <p>Webinar Title:</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box web-img">
                        <img src="/assets/indosat/webinar_rec.png">
                        <p>Webinar Title:</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box web-img">
                        <img src="/assets/indosat/webinar_rec.png">
                        <p>Webinar Title:</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h2>Upcoming webinars that you have signed up</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box web-img">
                        <img src="/assets/indosat/rounded.png">
                        <p>Date:</p><span>Time</span>
                        <p>Webinar Title:</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box web-img">
                        <img src="/assets/indosat/rounded.png">
                        <p>Date:</p><span>Time</span>
                        <p>Webinar Title:</p>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h2>Check out your monthly credit summary below.</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="box summary">
                        <img src="/assets/indosat/group281.png">
                        <p>Date:</p><span>Time</span>
                        <p>Webinar Title:</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection