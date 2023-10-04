@extends('layouts.app')
@section('title', 'Indosat Webinar')
@section('content')
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
                                <h1>Welcome <span class="aboard">aboard!</span></h1>
                            </div>
                            <p>This platform grants you the opportunity to select the webinar of your choice for participation.</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div id="carouselExampleControls1" class="owl-carousel new-carousel-credit" data-ride="carousel" data-interval="false">
                            <div class="item">
                                <div class="box credits purple">
                                    <span>Available Credits</span>
                                    <h2>{{auth('indosat_user')->user()->getTotalAvailableCredits()}}</h2>
                                    <img src="/assets/indosat/creditw.png">
                                </div>
                            </div>
                            <div class="item">
                                <div class="box credits">
                                    <span>Used Credits</span>
                                    <h2>{{auth('indosat_user')->user()->getTotalAvailableCredits()}}</h2>
                                    <img src="/assets/indosat/creditp.png">
                                </div>
                            </div>
                            <div class="item">
                                <div class="box credits">
                                    <span>Expired Credits</span>
                                    <h2>{{auth('indosat_user')->user()->getTotalExpiryCredits()}}</h2>
                                    <img src="/assets/indosat/creditp.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>We have suggested these webinars for you
                                <span class="all">See all</span>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ellipsis-pos">
                            <span data-tooltip="  Update Preferences" data-tooltip-location="top">
                                <i class="fa-solid fa-ellipsis-vertical fa-2xl"></i>
                            </span>
                        </div>
                        <div class="webinar_suggestions">
                            <div id="carouselExampleControls2" class="owl-carousel new-carousel-suggestions">
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main active">All</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Personal Branding</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Mental Well-Being</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Self-Development</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Effective Communication</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Career Preparation</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Leadership</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Management</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Career Talks</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">College Preparation</div>
                                </div>
                                <div class="item">
                                    <div id="high_web" data-id="" class="web-main">Language Proficiency</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="carouselExampleControls3" class="owl-carousel new-carousel-web" data-ride="carousel">
                            @foreach($events as $event)
                            <div class="item">
                                <div class="box web-img">
                                    <div class="web_sug_box">
                                        <span>Leadership</span>
                                    </div>
                                    <img src="/assets/indosat/webinar_rec.png" id="confirmBtn">
                                    <p>{{Str::limit($event->name, $limit = 20, $end = '...')}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>Upcoming webinars that you have signed up</h3>
                        </div>
                    </div>
                    <div id="carouselExampleControls4" class="owl-carousel new-carousel-web2" data-ride="carousel">
                        @foreach($signed_up_events as $event)
                        @php
                        $eventDate = \Carbon\Carbon::parse($event->event->date);
                        $now = \Carbon\Carbon::now();
                        @endphp

                        @if($eventDate->greaterThanOrEqualTo($now))
                        <div class="item">
                            <div class="box web-img">
                                <div class="web_sug_box upweb_sug_box">
                                    <span>Leadership</span>
                                </div>
                                <img src="/assets/indosat/rounded.png">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Date: {{$event->event->date}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>Time: {{$event->event->time}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>{{$event->event->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="view-button">
                                            <a href="{{route('indosat.webinar.details',$event->event->id)}}" class="button-green">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>Check out your monthly credit summary below.</h3>
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
                                                <select name="selected_month" class="form-control" id="month-select" style="border-radius: 20px; border-color: #8950E1; height: 50px;">
                                                    @php
                                                    $userCreatedAt = auth('indosat_user')->user()->created_at;
                                                    $currentMonthYear = now();
                                                    for ($date = $currentMonthYear; $date >= $userCreatedAt; $date->subMonth()) {
                                                    $formattedDate = $date->format('F Y');
                                                    $monthYearValue = $date->format('Y-m'); // Store month and year as a value
                                                    echo "<option value='{$monthYearValue}'>$formattedDate</option>";
                                                    }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-8"></div>
                            </div>
                            <div id="credit-list">
                                <!-- Data displayed here -->
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

                <div class="row mt-4">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="view-button">
                            <a href="#" class="button-green" id="interestBtn">Interest Popup</a>
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
        <div class="modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="">
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
        <div class="modal" id="interestModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="closeInterestModal">&times;</span>
                        <h3 class="congrats">Interests</h3>
                    </div>

                    <div class="modal-body">
                        <div class="modal-1">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="lead" style="font-weight: normal;">Select the webinar topics you'd be interested in attending.</p>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group interest-section">
                                        <div class="re-design">
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Personal Branding" name="interest" id="0Personal Branding">
                                                <label for="0Personal Branding">
                                                    <i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Personal Branding
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Leadership" name="interest" id="1Leadership">
                                                <label for="1Leadership">
                                                    <i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Leadership
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Career Preparation" name="interest" id="3Career Preparation">
                                                <label for="3Career Preparation"><i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Career Preparation
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Effective Communication" name="interest" id="4Effective Communication">
                                                <label for="4Effective Communication"><i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Effective Communication
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="College Preparation" name="interest" id="5College Preparation" checked="&quot;checked&quot;">
                                                <label for="5College Preparation">
                                                    <i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    College Preparation
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Mental Well-Being" name="interest" id="6Mental Well-Being">
                                                <label for="6Mental Well-Being">
                                                    <i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Mental Well-Being
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Management" name="interest" id="7Management">
                                                <label for="7Management">
                                                    <i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Management
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Career Talks" name="interest" id="8Career Talks" checked="&quot;checked&quot;">
                                                <label for="8Career Talks">
                                                    <i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Career Talks
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Self-Development" name="interest" id="9Self-Development" checked="&quot;checked&quot;">
                                                <label for="9Self-Development">
                                                    <i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Self-Development
                                                </label>
                                            </div>
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="Language Proficiency" name="interest" id="10Language Proficiency">
                                                <label for="10Language Proficiency">
                                                    <i class="fa-solid fa-plus" onclick="myfunction(this)"></i>
                                                    Language Proficiency
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a class="button-green" href="#">Save</a>
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
<!-- credit -->
<script>
    function updateCreditList(data) {
        var creditList = $('#credit-list');
        creditList.empty();

        $.each(data, function(index, credit) {
            var creditTypeClass = credit.credit < 0 ? 'credmin' : 'credmax';

            var createdAtDate = new Date(credit.created_at);

            var day = createdAtDate.getDate();
            var monthIndex = createdAtDate.getMonth();
            var year = createdAtDate.getFullYear();

            var monthNames = [
                "Jan", "Feb", "Mar", "Apr",
                "May", "Jun", "Jul", "Aug",
                "Sep", "Oct", "Nov", "Dec"
            ];

            var formattedDate = day + "-" + monthNames[monthIndex] + "-" + year;

            var html = '<div class="row">' +
                '<div class="col-lg-12">' +
                '<div class="sum-last mt-2">' +
                '<div class="pink-grad"></div>' +
                '<p class="pt-2 pl-2">Package Purchased: [' + credit.package_name + '] <br><span class="date">' + formattedDate + '</span></p>' +
                '<p class="' + creditTypeClass + '">' + credit.credit + ' Credit</p>' +
                '</div>' +
                '</div>' +
                '</div>';
            creditList.append(html);
        });
    }

    function loadFilteredData(month) {
        $.ajax({
            type: 'GET',
            url: '/filter-credit',
            data: {
                month: month
            },
            success: function(data) {
                updateCreditList(data);
            },
            error: function() {
                console.log('An error occurred while fetching data.');
            }
        });
    }

    $('#month-select').on('change', function() {
        var selectedMonthYear = $(this).val();
        loadFilteredData(selectedMonthYear);
    });

    // Get initial data 
    var currentDate = new Date();
    var currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0');
    var currentYear = currentDate.getFullYear();
    var currentMonthYear = currentYear + '-' + currentMonth;

    loadFilteredData(currentMonthYear);
</script>
{{-- carousel --}}
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

    $('.new-carousel-suggestions').owlCarousel({
        loop: true,
        autoWidth: true,
    })

    // $(function() {
    //     $('#datepicker').datepicker();
    // });
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
<script>
    var modal3 = document.getElementById("interestModal");
    var btn3 = document.getElementById("interestBtn");
    var span3 = document.getElementsByClassName("closeInterestModal")[0];
    btn3.onclick = function() {
        modal3.style.display = "block";
    }
    span3.onclick = function() {
        modal3.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
    }
</script>

{{-- icon toggle script --}}
<script>
    myfunction = (icon) => icon.classList.toggle('fa-check')
</script>
@endpush

@endsection