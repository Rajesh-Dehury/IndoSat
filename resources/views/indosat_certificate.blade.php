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
                    <div class="col-lg-6">
                        <div class="box certi-img">
                            <img src="/assets/indosat/express/certificate.png">
                            <div class="row m-2">
                                <div class="col-lg-12">
                                    <p class="date">Date:</p>
                                    <p class="title">Title:</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="view-button">
                                        <a href="" class="button-white">Preview</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="view-button">
                                        <a href="" class="button-green">Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="lock">
                            <h3>Click here to unlock this certificate</h3>
                            <i class="fa fa-lock fa-2xl" aria-hidden="true"></i>
                            <div class="box certi-img">
                                <img src="/assets/indosat/express/certificate.png">
                                <div class="row m-2">
                                    <div class="col-lg-12">
                                        <p class="date">Date:</p>
                                        <p class="title">Title:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="view-button">
                                            <a href="" class="button-white">Preview</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="view-button">
                                            <a href="" class="button-green">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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