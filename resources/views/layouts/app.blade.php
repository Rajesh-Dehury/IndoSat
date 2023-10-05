<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- owl carousel --}}
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Indosat Webinar</title>

    <link rel="stylesheet" href="{{ asset('css/indosat.css')}}">
    <link rel="stylesheet" href="{{ asset('css/indosat_webinar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/indosat_express.css')}}">
    <link rel="stylesheet" href="{{ asset('css/indosat_certificate.css')}}">

    @stack('css')
</head>

<body>
    @include('layouts.navigation')

    @yield('content')

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

    <script>
        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function() {
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>

    @stack('js')

</body>

</html>