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
            <a href="{{route('indosat.webinar.details',1)}}" class="wui-side-menu-item {{request()->routeIs('indosat.webinar.details')?'active':''}}">
                <div class="nav_card">
                    <img src="/assets/indosat/icon_express.png">
                    <img src="/assets/indosat/icon_express_active.png" class="img-top">
                </div>
                <span class="box-title">Express</span>
            </a>
        </li>
        <li>
            <a href="{{route('indosat.webinar')}}" class="wui-side-menu-item {{request()->routeIs('indosat.webinar')?'active':''}}">
                <div class="nav_card">
                    <img src="/assets/indosat/icon_webinar.png">
                    <img src="/assets/indosat/icon_webinar_active.png" class="img-top">
                </div>
                <span class="box-title">Webinar</span>
            </a>
        </li>
        <li>
            <a href="#" class="wui-side-menu-item">
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