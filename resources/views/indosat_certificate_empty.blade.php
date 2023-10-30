<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    {{-- owl carousel --}}
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Indosat Certificate</title>

    <link rel="stylesheet" href="/css/indosat.css">
    <link rel="stylesheet" href="/css/indosat_webinar.css">
    <link rel="stylesheet" href="/css/indosat_express.css">
    <link rel="stylesheet" href="/css/indosat_certificate.css">
</head>

<body>
    <div class="wui-side-menu open pinned" data-wui-theme="dark">
        <div class="wui-side-menu-header">
            <a href="#" class="wui-side-menu-trigger">
                <i class="fa fa-close" aria-hidden="true"></i>
            </a>
            <a href="#" class="wui-side-menu-pin-trigger" style="display: none;">
                <i class="fa fa-thumb-tack"></i>
            </a>
        </div>
        <ul class="wui-side-menu-items">
            <a class="navbar-brand" id="main_lv_logo">
                <img src="/assets/indosat/lifevitae_purple.png">
            </a>
            <li>
                <a href="#" class="wui-side-menu-item">
                    <div class="nav_card">
                        <img src="/assets/indosat/icon_express.png">
                        <img src="/assets/indosat/icon_express_active.png" class="img-top">
                    </div>
                    <span class="box-title">Express</span>
                </a>
            </li>
            <li>
                <a href="#" class="wui-side-menu-item">
                    <div class="nav_card">
                        <img src="/assets/indosat/icon_webinar.png">
                        <img src="/assets/indosat/icon_webinar_active.png" class="img-top">
                    </div>
                    <span class="box-title">Webinar</span>
                </a>
            </li>
            <li>
                <a href="#" class="wui-side-menu-item active">
                    <div class="nav_card">
                        <img src="/assets/indosat/icon_certificate.png">
                        <img src="/assets/indosat/icon_certificate_active.png" class="img-top">
                    </div>
                    <span class="box-title">Certificate</span>
                </a>
            </li>
            <li>
                <a href="#" class="wui-side-menu-item">
                    <div class="nav_card">
                        <img src="/assets/indosat/icon_scratch.png">
                        <img src="/assets/indosat/icon_scratch_active.png" class="img-top">
                    </div>
                    <span class="box-title">Scratch & Win</span>
                </a>
            </li>
        </ul>
        <div class="navbar-upgrade">
            <img src="/assets/indosat/bolt.png">
            <p>Upgrade to </p>
            <p>LifeVitae Advance</p>
            <button class="button-upgrade" id="">Upgrade</button>
        </div>
    </div>
    <div class="wui-content">
        <div class="wui-content-header">
            <a href="#" class="wui-side-menu-trigger">
                <i class="fas fa-align-left"></i>
            </a>
        </div>
        <div class="wui-content-main">
            <section class="webinar sections-bg vh-100 position-relative" style="overflow: hidden;">
                <div class="container" data-aos="fade-up">
                    <img src="/assets/indosat/ellipse-1.png" alt="" class="ellipse-1">
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="section-header">
                                <h3>Your certificates</h3>
                            </div>
                        </div>
                        <div class="col-lg-12 row h-100 align-items-center justify-content-center">
                            <img src="/assets/indosat/Add_certificate.png" alt="" class="Add_certificate">
                        </div>
                        <p class="certificate_empty_text">Certificates will be awarded for your active participation in the webinars you attend, acknowledging your dedication.</p>
                    </div>
                    <img src="/assets/indosat/ellipse-2.png" alt="" class="ellipse-2">
                </div>
            </section>
        </div>
    </div>

    <script>
        (function(window, undefined) {
            'use strict';
            // responsive pinnable sidemenu component
            var sideMenu = function(el) {
                var htmlSideMenu = el,
                    htmlSideMenuPinTrigger = {},
                    htmlSideMenuPinTriggerImage = {},
                    htmlOverlay = {};
                var init = function() {
                    htmlSideMenuPinTrigger = el.querySelector('.wui-side-menu-pin-trigger');
                    htmlSideMenuPinTriggerImage = htmlSideMenuPinTrigger.querySelector('i.fa');
                    htmlOverlay = document.querySelector('.wui-overlay');
                    Array.prototype.forEach.call(document.querySelectorAll('.wui-side-menu-trigger'), function(elmt, i) {
                        elmt.addEventListener('click', function(e) {
                            e.preventDefault();
                            toggleMenuState();
                        }, false);
                    });
                    htmlSideMenuPinTrigger.addEventListener('click', function(e) {
                        e.preventDefault();
                        toggleMenuPinState();
                    }, false);
                    htmlOverlay.addEventListener("click", function(e) {
                        htmlSideMenu.classList.remove('open');
                    }, false);
                    window.addEventListener("resize", checkIfNeedToCloseMenu, false);
                    checkIfNeedToCloseMenu();
                };
                var toggleMenuState = function() {
                    htmlSideMenu.classList.toggle('open');
                    menuStateChanged(htmlSideMenu, htmlSideMenu.classList.contains('open'));
                };
                var toggleMenuPinState = function() {
                    htmlSideMenu.classList.toggle('pinned');
                    htmlSideMenuPinTriggerImage.classList.toggle('fa-rotate-90');
                    if (htmlSideMenu.classList.contains('pinned') !== true) {
                        htmlSideMenu.classList.remove('open');
                    }
                    menuPinStateChanged(htmlSideMenu, htmlSideMenu.classList.contains('pinned'));
                };
                var checkIfNeedToCloseMenu = function() {
                    var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                    if (width <= 1024 && htmlSideMenu.classList.contains('open') === true) {
                        htmlSideMenu.classList.remove('open');
                        menuStateChanged(htmlSideMenu, htmlSideMenu.classList.contains('open'));
                    }
                    if (width <= 767 && htmlSideMenu.classList.contains('open') === true) {
                        htmlSideMenu.classList.remove('open');
                        menuStateChanged(htmlSideMenu, htmlSideMenu.classList.contains('open'));
                    }
                    if (width > 767 && htmlSideMenu.classList.contains('pinned') === false) {
                        htmlSideMenu.classList.remove('open');
                        menuStateChanged(htmlSideMenu, htmlSideMenu.classList.contains('open'));
                    }
                };
                var menuStateChanged = function(element, state) {
                    var evt = new CustomEvent('menuStateChanged', {
                        detail: {
                            open: state
                        }
                    });
                    element.dispatchEvent(evt);
                };
                var menuPinStateChanged = function(element, state) {
                    var evt = new CustomEvent('menuPinStateChanged', {
                        detail: {
                            pinned: state
                        }
                    });
                    element.dispatchEvent(evt);
                };
                init();
                return {
                    htmlElement: htmlSideMenu,
                    toggleMenuState: toggleMenuState,
                    toggleMenuPinState: toggleMenuPinState
                };
            };

            window.SideMenu = sideMenu;
        })(window);


        var documentReady = function(fn) {
            if (document.readyState != 'loading') {
                fn();
            } else {
                document.addEventListener('DOMContentLoaded', fn);
            }
        };

        documentReady(function() {
            var sample = new SideMenu(document.querySelector('.wui-side-menu'))
            sample.htmlElement.addEventListener('menuPinStateChanged', function(e) {
                document.querySelector('#events').innerHTML += 'menuPinStateChanged , menu pinned? => ' +
                    e.detail.pinned + '<br>';
            }, false);
            sample.htmlElement.addEventListener('menuStateChanged', function(e) {
                document.querySelector('#events').innerHTML += 'menuStateChanged , menu open? => ' +
                    e.detail.open + '<br>';
            }, false);
        });
    </script>
</body>

</html>