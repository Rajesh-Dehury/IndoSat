@extends('layouts.app')
@section('title', 'Indosat Webinar')
@section('content')
@push('css')
<link rel="stylesheet" href="/css/indosat_webinar.css">
@endpush
<div class="wui-content">
    <div class="wui-content-header">
        <a href="#" class="wui-side-menu-trigger">
            <i class="fas fa-align-left"></i>
        </a>
    </div>
    <div class="wui-content-main">

        {{-- page content --}}

        <section class="webinar sections-bg" id="webinarDetails">
            <div class="container" data-aos="fade-up">

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="welcome-text">
                            <div class="section-header upper">
                                <h1>Welcome <span class="aboard">aboard!</span></h1>
                            </div>
                            <p>This platform grants you the opportunity to select the webinar of your choice for participation.</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>Webinar Details</h3>
                        </div>
                    </div>
                    <div class="box web-img">
                        <img src="/assets/indosat/webinar_details.png">
                        <div class="date-box box1">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>Date</span>
                        </div>
                        <div class="date-box box1">
                            <i class="fa-solid fa-clock"></i>
                            <span>Time</span>
                        </div>
                        <div class="details">
                            <p>Webinar Title:
                                <br>Speaker:
                                <br>Zoom Link:
                                <br>Zoom ID:
                            </p>
                        </div>
                        <div class="info">Please join the Zoom meeting 10 minutes prior to the scheduled start time.</div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>Your selected webinars</h3>
                        </div>
                    </div>
                    <div id="carouselExampleControls_7" class="owl-carousel new-carousel-selected" data-ride="carousel">
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/webinar_selected.png">
                                <div class="date-box box2">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>Date</span>
                                </div>
                                <div class="date-box box3">
                                    <i class="fa-solid fa-clock"></i>
                                    <span>Time</span>
                                </div>
                                <div class="details">
                                    <p>Webinar Title:
                                        <br>Speaker:
                                        <br>Zoom Link:
                                        <br>Zoom ID:
                                    </p>
                                </div>
                                <div class="info">Please join the Zoom meeting 10 minutes prior to the scheduled start time.
                                    <span class="back-arrow">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/webinar_selected.png">
                                <div class="date-box box2">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>Date</span>
                                </div>
                                <div class="date-box box3">
                                    <i class="fa-solid fa-clock"></i>
                                    <span>Time</span>
                                </div>
                                <div class="details">
                                    <p>Webinar Title:
                                        <br>Speaker:
                                        <br>Zoom Link:
                                        <br>Zoom ID:
                                    </p>
                                </div>
                                <div class="info">Please join the Zoom meeting 10 minutes prior to the scheduled start time.
                                    <span class="back-arrow">
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>Previously participated in webinars.</h3>
                        </div>
                    </div>
                    <div id="carouselExampleControls_7" class="owl-carousel new-carousel-previous" data-ride="carousel">
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/webinar_rec.png">
                                <p>Webinar Title:</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/webinar_rec.png">
                                <p>Webinar Title:</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/webinar_rec.png">
                                <p>Webinar Title:</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/webinar_rec.png">
                                <p>Webinar Title:</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="view-button">
                            <a href="#" class="button-green" id="">Start LifeVitae Express</a>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </section>
    </div>
</div>


<div class="wui-overlay"></div>


@push('js')
{{-- carousel --}}
<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
<script>
    $('.new-carousel-selected').owlCarousel({
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 2,
                nav: false
            }
        },
        margin: 40,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    })

    $('.new-carousel-previous').owlCarousel({
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: false
            }
        },
        margin: 40,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    })

    $(function() {
        $('#datepicker').datepicker();
    });
</script>

@endpush

@endsection