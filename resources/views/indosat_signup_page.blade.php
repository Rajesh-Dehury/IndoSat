@extends('layouts.guest')
@section('title', 'Indosat Signup')
@section('content')
<nav class="navbar navbar-expand-lg inner-nav navbar-dark fixed-top py-3" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand " id="main_lv_logo">
            <img src="/assets/teachers/lifevitae_logo.png" style="display: none;">
        </a>
        <div class="d-flex">
            <select class="border-0 changeLang" style="background-color: transparent;" aria-label="Default select example">
                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="bahasa" {{ session()->get('locale') == 'bahasa' ? 'selected' : '' }}>Bahasa</option>
            </select>
        </div>
        <!-- <div class="collapse navbar-collapse" id="navbarResponsive">
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
                        </li>
                    </ul>
                </li>
            </ul>
        </div> -->
    </div>
</nav>

<div class="signup_banner">
    <div class="row">
        <div class="col-md-4">
            <section class="grad-section">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12 align-self-baseline">
                            <img class="signup-logo" src="/assets/indosat/lifevitae.png">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-8">
            <section class="signup-section">
                <img class="people-logo" src="/assets/indosat/signup_people.png">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-12 align-self-baseline">
                                    <div style="margin: 20px 0;"></div>
                                    <div class="mb-3 title2 text-center">{{ __('lang.signup.signup') }}</div>
                                    <form id="" method="POST" class="signup_form" action="{{route('indosat.signup')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input name="unique_code" maxlength="255" autocomplete="off" type="text" value="{{old('unique_code')}}" class="form-control" placeholder="{{ __('lang.signup.unique_code') }}">
                                        </div>
                                        @error('unique_code')
                                        <p class="text-danger d-inline-block text-danger">{{$message}}</p>
                                        @enderror
                                        <div class="form-group" style="position: relative;" x-data="{ show: true }">
                                            <input type="password" :type="show ? 'password' : 'text'" name="password" autocomplete="off" id="password" class="form-control" placeholder="{{ __('lang.signup.password') }}">
                                            <button type="button" class="app-input_show-password" id="show_password" @click="show = !show"></button>
                                        </div>
                                        @error('password')
                                        <p class="text-danger d-inline-block text-danger">{{$message}}</p>
                                        @enderror
                                        <div class="form-group" style="position: relative;" x-data="{ show: true }">
                                            <input type="password" :type="show ? 'password' : 'text'" name="password_confirmation" autocomplete="off" id="password_confirmation" class="form-control" placeholder="{{ __('lang.signup.password_confirm') }}">
                                            <button type="button" class="app-input_show-password" id="show_password" @click="show = !show"></button>
                                        </div>
                                        @error('password_confirmation')
                                        <p class="text-danger d-inline-block text-danger">{{$message}}</p>
                                        @enderror
                                        <button type="submit" class="mt-5 btn btn-grad">
                                            <span>{{ __('lang.signup.signin') }}</span>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <div class="login_links mt-5 text-center">
                                        <p>{{ __('lang.signup.already_have_an_account') }} <a href="{{route('indosat.login')}}" class="">{{ __('lang.signup.login') }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection