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
                <div class="row mt-4 gap owl-carousel new-carousel-credit" id="carouselExampleControls1" data-ride="carousel" data-interval="false">
                    <div class="col-sm-12 p-0">
                        <div class="cred_box purple_bg">
                            <div class="">
                                <span class="d-block mb-2">Available Credits</span>
                                <h2>{{$available_credits}}</h2>
                                <img src="/assets/indosat/creditw.png" class="cred_img">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 p-0">
                        <div class="cred_box">
                            <div class="">
                                <span class="d-block mb-2">Used Credits</span>
                                <h2>{{$used_credits}}</h2>
                                <img src="/assets/indosat/creditp.png" class="cred_img">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 p-0">
                        <div class="cred_box">
                            <div class="">
                                <span class="d-block mb-2">Expired Credits</span>
                                <h2>{{$exp_credits}}</h2>
                                <img src="/assets/indosat/creditp.png" class="cred_img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header row align-items-center">
                            <h3 class="col-10">We have suggested these webinars for you</h3>
                            <a href="{{route('indosat.webinarAll')}}" class="col-2"><span class="all">See all</span></a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ellipsis-pos" onclick="modalPreferences()">
                            <span data-tooltip="Update Preferences" data-tooltip-location="top">
                                <i class="fa-solid fa-ellipsis-vertical fa-2xl"></i>
                            </span>
                        </div>
                        <div class="webinar_suggestions">
                            <div class="d-flex webinar_suggestions_list pl-2">
                                <div id="{{\Str::slug('All')}}" data-id="{{\Str::slug('All')}}" class="web-main active">All</div>
                                @foreach($webinar_categories as $cat)
                                @if(in_array($cat->id, $user_webinar_categories_array))
                                <div id="{{\Str::slug($cat->title)}}" data-id="{{\Str::slug($cat->title)}}" class="web-main">{{$cat->title}}</div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="carouselExampleControls3" class="" style="overflow: hidden;">
                            <div class="d-flex webinar_suggestions_list">
                                @foreach($events as $event)
                                <div class="itemBox col-12 col-sm-6 col-md-3 {{\Str::slug($event->webinarCategory->title)}}" onclick="openConfirmModal({{$event->id}}, '{{$event->name}}')" style="cursor: pointer;">
                                    <div class="box web-img">
                                        <div class="web_sug_box">
                                            <span>{{$event->webinarCategory->title}}</span>
                                        </div>
                                        <img src="{{asset('assets/indosat/webinar_rec.png')}}">
                                        <p>{{$event->name}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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
                            <a href="{{route('indosat.webinar.details',$event->event->id)}}" style="text-decoration:none;">
                                <div class="box web-img">
                                    <div class="web_sug_box web_sug_box_list_2 upweb_sug_box">
                                        <span>{{$event->event->webinarCategory->title}}</span>
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
                            </a>
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
                                        <p>You’ve got {{$last_credit->credit}} credits and {{$latest_exp_credit->credit}} credit is expiring on {{$latest_exp_credit->created_at->format('j F Y')}}!</p>
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
                                                <select name="selected_month" class="form-control" id="month-select" style="border-radius: 20px; border-color: #8950E1; height: 50px;outline: none;box-shadow:none;">
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
                            <form method="POST" action="{{route('indosat.webinar.confirm')}}" class="row">
                                @csrf
                                <input type="hidden" id="event_id" name="event_id">
                                <div class="col-sm-12">
                                    <div style="width: 200px; margin: 10px auto;">
                                        <img style="width: 100%;" src="/assets/indosat/popup_confirm_webinar.png">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p class="lead">You have selected Webinar: <span id="webinarTitle"></span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="button-white btn btn-block closeCM">Cancel</p>
                                </div>
                                <div class="col-sm-6">
                                    <button class="button-green btn btn-block">Proceed</button>
                                </div>
                            </form>
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
                            <form method="POST" action="{{route('indosat.sync.preference')}}" class="row">
                                @csrf
                                <div class="col-sm-12 mb-3">
                                    <p class="lead" style="font-weight: normal;">Select the webinar topics you'd be interested in attending.</p>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group interest-section">
                                        <div class="re-design">
                                            @foreach($webinar_categories as $cat)
                                            <div class="interest-widget">
                                                <input type="checkbox" class="form-check-input" value="{{$cat->id}}" name="interest[]" id="{{\Str::slug($cat->title)}}{{$cat->id}}" {{in_array($cat->id, $user_webinar_categories_array)?'checked':''}}>
                                                <label for="{{\Str::slug($cat->title)}}{{$cat->id}}">
                                                    <i class="fa-solid fa-plus"></i>
                                                    {{$cat->title}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <button class="button-green btn btn-block">Save</button>
                                </div>
                            </form>
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
                '<p class="pt-2 pl-2 pt-sm-3 text-webinar">' + (credit.is_credit == 1 ? "webinar package purchased" : credit.package_name + " registered") + ' <br><span class="date">' + formattedDate + '</span></p>' +
                '<p class="text-webinar mar-r-3 ' + (credit.is_credit == 1 ? "credmax" : "credmin") + '">' + (credit.is_credit == 1 ? "" : "-") + credit.credit + (credit.is_credit == 1 ? " Credit" : " Debit") + '</p>' +
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

    // $('.new-carousel-suggestions').owlCarousel({
    //     loop: true,
    //     autoWidth: true,
    // })

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
    var confirmModal = document.getElementById("confirmModal");
    var closeBtn = document.querySelector(".closeConfirmModal");
    var closeCM = document.querySelector(".closeCM");
    var webinarTitleElement = document.getElementById("webinarTitle");
    var eventIdInput = document.getElementById("event_id");

    closeBtn.onclick = function() {
        confirmModal.style.display = "none";
    }
    closeCM.onclick = function() {
        confirmModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == confirmModal) {
            confirmModal.style.display = "none";
        }
    }

    function openConfirmModal(event_id, title) {
        eventIdInput.value = event_id;
        webinarTitleElement.textContent = title;
        confirmModal.style.display = "block";
    }
</script>
<script>
    var interestModal = document.getElementById("interestModal");
    var interestBtn = document.getElementById("interestBtn");
    var closeInterestModal = document.getElementsByClassName("closeInterestModal")[0];
    interestBtn.onclick = function() {
        interestModal.style.display = "block";
    }
    closeInterestModal.onclick = function() {
        interestModal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == interestModal) {
            interestModal.style.display = "none";
        }
    }
    "@if(session()-> has('popup'))
    modalPreferences()
    @endif "

    function modalPreferences() {
        interestModal.style.display = "block";
    }
</script>

{{-- icon toggle script --}}
<script>
    myfunction = (icon) => icon.classList.toggle('fa-check')
</script>

<!-- Suggest filter -->
<script>
    $(document).ready(function() {
        var owl = $('.new-carousel-web');

        function initializeCarousel() {
            owl.owlCarousel({
                responsive: {
                    0: {
                        items: 1,
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
            });
        }

        initializeCarousel();

        $(".web-main").click(function() {

            $(this).addClass("active").siblings().removeClass("active");

            const value = $(this).attr("data-id");

            if (value == 'all') {
                $(".itemBox").show('1000');
            } else {
                $(".itemBox").not('.' + value).hide('1000');
                $(".itemBox").filter('.' + value).show('1000');
            }

            owl.trigger('destroy.owl.carousel');
            initializeCarousel();
        })
    })
</script>
@endpush

@endsection