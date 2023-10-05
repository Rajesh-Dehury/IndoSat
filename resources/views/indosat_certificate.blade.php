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
                    <div class="col-lg-6">
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
                                        <div style="border-bottom: 2px solid #1C1C1C; margin: 8px; width:100%;"></div>
                                        <p class="b_right_text">Founder & CEO, LifeVitae</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col-12">
                                    <p class="date">Date: {{$event->event->date}}</p>
                                    <p class="title">Title: {{$event->event->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="view-button">
                                        <a href="{{route('indosat.certificate.preview',[$event->event_id,$event->indosat_user_id])}}" class="button-white">Preview</a>
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
                    @endforeach
                    <div class="col-lg-6">
                        <div class="lock">
                            <div class="box certi-img">
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
                                            <h1 id="recipientName" class="text-center mid_text1">Name Surname</h1>
                                            <p class="mid_text2 ">
                                                for attending *<span id="courseName" class="mid_text_font">EVENT NAME - WEBINAR</span>* on *<span id="completionDate" class="mid_text_font">Event Date</span>*, led by guest speaker *<span id="SpeakrName" class="mid_text_font">SPEAKER NAME</span>* conducted by LifeVitae.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="bottom-right">
                                        <p class="b_right_text1 fw-bold">Priya Sengupta</p>
                                        <div style="border-bottom: 2px solid #1C1C1C; margin: 8px; width:100%;"></div>
                                        <p class="b_right_text">Founder & CEO, LifeVitae</p>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <div class="col-12">
                                        <p class="date">Date:</p>
                                        <p class="title">Title:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="view-button">
                                            <a href="" class="button-white">Preview</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="view-button">
                                            <a href="" class="button-green">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lock-text">
                            <h3>Click here to unlock this certificate</h3>
                            <i class="fa fa-lock fa-2xl" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="wui-overlay"></div>

@push('js')
<script>

</script>
@endpush

@endsection