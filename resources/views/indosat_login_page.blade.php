@extends('layouts.guest')
@section('title', 'Indosat Login')
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
    </div>
</nav>

{{-- for mobile view --}}
<div id="login_mobile" class="login_banner">
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
                <img class="people-logo-left" src="/assets/indosat/login_people.png">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-12 text-left align-self-baseline">
                                    <div style="margin: 20px 0;"></div>
                                    <div class="mt-3 title1">Welcome back!<span>&#128075;</span></div>
                                    <div class="mb-3 title2">Login to your account</div>
                                    <form method="POST" class="login_form" action="{{route('indosat.login')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">{{ __('lang.signup.unique_code') }}</label>
                                            <input name="unique_code" maxlength="255" autocomplete="off" type="text" value="{{old('unique_code')}}" class="form-control">
                                        </div>
                                        @error('unique_code')
                                        <p class="text-danger d-inline-block text-danger">{{$message}}</p>
                                        @enderror
                                        <div class="form-group" style="position: relative;" x-data="{ show: true }">
                                            <label for="password">{{ ucfirst(__('lang.login.password')) }}</label>
                                            <input type="password" :type="show ? 'password' : 'text'" name="password" autocomplete="off" class="form-control">
                                            <button type="button" class="app-input_show-password" @click="show = !show"></button>
                                        </div>
                                        @error('password')
                                        <p class="text-danger d-inline-block text-danger">{{$message}}</p>
                                        @enderror
                                        <button type="submit" class="mt-5 btn btn-grad">
                                            <span>Sign in</span>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <div class="login_links mt-5 text-center">
                                        <p>Don't have any account yet? <a href="{{route('indosat.signup')}}" class="">Sign up</a></p>
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

{{-- for desktop and tab --}}
<div id="login-desktop" class="login_banner">
    <div class="row">
        <div class="col-md-8">
            <section class="login-section">
                <img class="people-logo-right" src="/assets/indosat/login_people.png">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-sm-6">
                            <div class="row text-center">
                                <div class="col-12 align-self-baseline">
                                    <img class="login-logo" src="/assets/indosat/lifevitae.png">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 align-self-baseline">
                                    <div style="margin: 20px 0;"></div>
                                    <div class="mt-3 title1">{{ __('lang.login.welcome_back') }}<span>&#128075;</span></div>
                                    <div class="mb-3 title2">{{ __('lang.login.login_to_your_account') }}</div>
                                    <form method="POST" class="login_form" action="{{route('indosat.login')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">{{ __('lang.login.unique_code') }}</label>
                                            <input name="unique_code" maxlength="255" autocomplete="off" type="text" value="{{old('unique_code')}}" class="form-control">
                                        </div>
                                        @error('unique_code')
                                        <p class="text-danger d-inline-block text-danger">{{$message}}</p>
                                        @enderror
                                        <div class="form-group" style="position: relative;" x-data="{ show: true }">
                                            <label for="password">{{ ucfirst(__('lang.login.password')) }}</label>
                                            <input type="password" :type="show ? 'password' : 'text'" name="password" autocomplete="off" class="form-control">
                                            <button type="button" class="app-input_show-password" @click="show = !show"></button>
                                        </div>
                                        @error('password')
                                        <p class="text-danger d-inline-block text-danger">{{$message}}</p>
                                        @enderror
                                        <button type="submit" class="mt-5 btn btn-grad">
                                            <span>{{ __('lang.login.signup') }}</span>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <div class="login_links mt-5 text-center">
                                        <p>{{ __('lang.login.dont_have_account') }} <a href="{{route('indosat.signup')}}" class="">{{ __('lang.login.signup') }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-4">
            <section class="grad-section">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12 align-self-baseline">
                            <img class="login-logo2" src="/assets/indosat/lifevitae.png">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection