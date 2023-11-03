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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <a href="{{route('indosat.webinar')}}" class="">
                                <h4><i class="fa-solid fa-chevron-left mr-3"></i>See All</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    @foreach($events as $event)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="itemBox {{\Str::slug($event->webinarCategory->title)}}" onclick="openConfirmModal({{$event->id}}, '{{$event->name}}')" style="cursor: pointer;">
                            <div class="box web-img">
                                <div class="web_sug_box">
                                    <span>{{$event->webinarCategory->title}}</span>
                                </div>
                                <img src="{{asset('assets/indosat/webinar_rec.png')}}">
                                <p>{{$event->name}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
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
@push('js')
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
@endpush
@endsection