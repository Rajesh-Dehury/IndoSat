@extends('layouts.app')
@section('title', 'Indosat Certificate')
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
                            <div class="section-header font-purple">
                                <h4>Great Job,</h4>
                            </div>
                            <p>You’ve earned certificates!</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h3>Your certificates</h3>
                        </div>
                    </div>
                    @foreach($certificates as $event)
                    <div class="col-lg-6 mb-5">
                        <div class="{{in_array($event->event->id, $user_certificate_event_ids)?'':'lock'}}">
                            <div class="box certi-img">
                                <div class="container">
                                    <div class="certificate">
                                        <img class="certificate-border" src="/assets/indosat/express/certificate.png" alt="Certificate Border 1">
                                        <div class="top-left">
                                            <!-- <pre> -->
                                            <p><span class="tp_left_text">LIFEVITAE</span></p>
                                            <p><span class="tp_left_text2">CERTIFICATE OF</span></p>
                                            <p><span class="tp_left_text1">ACHIEVEMENT</span></p>
                                            <!-- </pre> -->
                                        </div>
                                        <img class="big-image" src="/assets/indosat/express/badges_teal_2.png" alt="Big Image">
                                        <div class="form-content">
                                            <h2 class="mid_text">This is to certify that</h2>
                                            <div class="card-body">
                                                <h1 id="recipientName" class="text-center mid_text1">{{$event->user->name}}</h1>
                                                <p class="mid_text2 ">
                                                    for attending *<span id="courseName" class="mid_text_font">{{$event->event->name}}</span>* on *<span id="completionDate" class="mid_text_font">{{$event->event->date}}</span>*, led by guest speaker *<span id="SpeakrName" class="mid_text_font">{{$event->event->speaker_name}}</span>* conducted by LifeVitae.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="bottom-right">
                                            <p class="b_right_text1 fw-bold">Priya Sengupta</p>
                                            <div style="border-bottom: 2px solid #1C1C1C; margin: 4px; width:100%;"></div>
                                            <p class="b_right_text">Founder & CEO, LifeVitae</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-12">
                                        <p class="date">Date: {{$event->event->date}}</p>
                                        <p class="title">Title: {{\Str::limit($event->event->name,40)}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="view-button">
                                            <a href="{{route('indosat.certificate.preview',[$event->event_id,$event->indosat_user_id])}}" class="button-white" target="_blank">Preview</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="view-button">
                                            <a href="{{route('indosat.certificate.download',[$event->event_id,$event->indosat_user_id])}}" class="button-green">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!in_array($event->event->id, $user_certificate_event_ids))
                        <div class="lock-text">
                            <h3 onclick="openModal({{$event->event->id}}, '{{$event->event->name}}')">Click here to unlock this certificate</h3>
                            <i class="fa fa-lock fa-2xl" aria-hidden="true"></i>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="modal" id="CertificateModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header closeCertificateModal">
                        <span class="closeConfirmModal">&times;</span>
                        <h3 class="confirm">Confirmation!</h3>
                    </div>
                    <div class="modal-body">
                        <div class="modal-1">
                            <form class="row" method="POST" action="{{route('indosat.certificate.unlock')}}">
                                @csrf
                                <input type="hidden" id="event_id" name="event_id">
                                <input type="text" class="form-control mb-2" placeholder="Enter Certificate Code" name="certificate_code">
                                <div class="col-sm-12">
                                    <p class="lead"><span id="webinarTitle"></span></p>
                                </div>
                                <div class="row">
                                    <button class="button-green">Proceed</button>
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
<script>
    var modal = document.getElementById("CertificateModal");
    var closeBtn = document.querySelector(".closeCertificateModal");
    var webinarTitleElement = document.getElementById("webinarTitle");
    var eventIdInput = document.getElementById("event_id");

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function openModal(event_id, title) {
        eventIdInput.value = event_id;
        webinarTitleElement.textContent = title;
        modal.style.display = "block";
    }
</script>
@endpush

@endsection