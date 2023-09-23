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

        <section class="webinar sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="welcome-text">
                            <div class="section-header upper">
                                <h1>{{ __('lang.webinar.welcome') }} <span class="aboard">{{ __('lang.webinar.aboard') }}</span></h1>
                            </div>
                            <p>{{ __('lang.webinar.this_platform_grants') }}</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div id="carouselExampleControls_7" class="owl-carousel new-carousel-credit" data-ride="carousel" data-interval="false">
                            <div class="item">
                                <div class="box credits purple">
                                    <span>{{ __('lang.webinar.available_credits') }}</span>
                                    <h2>01</h2>
                                    <img src="/assets/indosat/creditw.png">
                                </div>
                            </div>
                            <div class="item">
                                <div class="box credits">
                                    <span>{{ __('lang.webinar.used_credits') }}</span>
                                    <h2>00</h2>
                                    <img src="/assets/indosat/creditp.png">
                                </div>
                            </div>
                            <div class="item">
                                <div class="box credits">
                                    <span>{{ __('lang.webinar.expired_credits') }}</span>
                                    <h2>00</h2>
                                    <img src="/assets/indosat/creditp.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>{{ __('lang.webinar.here_are') }}</h3>
                        </div>
                    </div>
                    <div id="carouselExampleControls_7" class="owl-carousel new-carousel-web" data-ride="carousel">
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/webinar_rec.png" id="confirmBtn">
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
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>{{ __('lang.webinar.upcoming_webinars') }}</h3>
                        </div>
                    </div>
                    <div id="carouselExampleControls_7" class="owl-carousel new-carousel-web2" data-ride="carousel">
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/rounded.png">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Date:</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>Time:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>Webinar Title:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="view-button">
                                            <a href="http://127.0.0.1:8000/indosatWebinarDetails" class="button-green">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box web-img">
                                <img src="/assets/indosat/rounded.png">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Date:</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>Time:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>Webinar Title:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="view-button">
                                            <a href="http://127.0.0.1:8000/indosatWebinarDetails" class="button-green">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>{{ __('lang.webinar.check_out_your_monthly_credit') }}</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="box summary">
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-2">
                                    <div class="text-center">
                                        <img src="/assets/indosat/group281.png">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="sum-grad mt-5">
                                        <p>You’ve got 02 credits and 1 credit is expiring on 30 September 2023!</p>
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <form class="month-form">
                                        <div class="col-lg-12">
                                            <div class="input-group input-wrapper month" id="datepicker">
                                                <label for="month">Month</label>
                                                <input type="month" class="form-control" id="month" value="August 2023" style="border-radius: 20px; border-color: #8950E1; height: 50px;" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-8"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sum-last mt-2">
                                        <div class="pink-grad"></div>
                                        <p class="pt-2 pl-2">Package Purchased: [Package Name] <br><span class="date">30 AUG 2023</span> </p>
                                        <p class="credmin">-1 Credit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sum-last mt-2">
                                        <div class="pink-grad"></div>
                                        <p class="pt-2 pl-2">Package Purchased: [Package Name] <br><span class="date">30 AUG 2023</span> </p>
                                        <p class="credmax">+2 Credit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sum-last mt-2">
                                        <div class="pink-grad"></div>
                                        <p class="pt-2 pl-2">Package Purchased: [Package Name] <br><span class="date">30 AUG 2023</span> </p>
                                        <p class="credmin">-1 Credit</p>
                                    </div>
                                </div>
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

                <div class="row mt-4">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="view-button">
                            <a href="#" class="button-green" id="creditBtn">Credits Popup</a>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </section>

        <div class="modal" id="creditModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="closeCreditModal">&times;</span>
                        <h3 class="congrats">Congratulations!</h3>
                    </div>

                    <div class="modal-body">
                        <div class="modal-1">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div style="width: 200px; margin: 10px auto;">
                                        <img style="width: 100%;" src="/assets/indosat/popup_credits.png">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p class="lead">You have received 1 express credit.</p>
                                </div>
                                <div class="col-sm-12">
                                    <a class="button-green" href="#">Okay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="closeConfirmModal">&times;</span>
                        <h3 class="confirm">Confirmation!</h3>
                    </div>

                    <div class="modal-body">
                        <div class="modal-1">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div style="width: 200px; margin: 10px auto;">
                                        <img style="width: 100%;" src="/assets/indosat/popup_confirm_webinar.png">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p class="lead">You have selected Webinar: [Title].</p>
                                </div>
                                <div class="col-sm-6">
                                    <a class="button-white" href="#">Cancel</a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="button-green" href="#">Proceed</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="wui-overlay"></div>
@push('js')

{{-- carousel --}}
<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
<script>
    $('.new-carousel-credit').owlCarousel({
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            }
        },
        margin: 40,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    })

    $('.new-carousel-web').owlCarousel({
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

    $('.new-carousel-web2').owlCarousel({
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

    $(function() {
        $('#datepicker').datepicker();
    });
</script>

{{-- popup script --}}
<script>
    var modal1 = document.getElementById("creditModal");
    var btn2 = document.getElementById("creditBtn");
    var span1 = document.getElementsByClassName("closeCreditModal")[0];
    btn2.onclick = function() {
        modal1.style.display = "block";
    }
    span1.onclick = function() {
        modal1.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
</script>
<script>
    var modal2 = document.getElementById("confirmModal");
    var btn2 = document.getElementById("confirmBtn");
    var span2 = document.getElementsByClassName("closeConfirmModal")[0];
    btn2.onclick = function() {
        modal2.style.display = "block";
    }
    span2.onclick = function() {
        modal2.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
</script>
@endpush

@endsection