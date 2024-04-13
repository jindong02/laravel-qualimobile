<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-dark fixed-top py-3 "
    data-navbar-on-scroll="data-navbar-on-scroll">
    <div id="containerMobile" class="container mt-lg-4" style="display: flex; align-items: center;">
        <div class="d-flex justify-content-end">
            <div class="offcanvas-header">
                <button class="btn-close"></button>
            </div>
        </div>
        <a aria-label="Logo" class="navbar-brand logo logo-menu-mobile me-7" href="{{ route('index') }}">
            <img alt="Logo" src="{{ url('assets/svg/logo-white.svg') }}">
        </a>
        <ul class="navbar-nav me-auto md-align-items-center">
            <li class="nav-item d-none d-sm-none d-lg-block">
                <a class="nav-link text-uppercase" href="{{ route('historia') }}">{{ __('A QUALIMOBILE') }}</a>
            </li>

            <li class="nav-item d-none d-sm-none d-lg-block">
                <a class="nav-link text-uppercase" href="{{ route('cases.index') }}">{{ __('CASES') }}</a>
            </li>

            @include('layouts.navigation')

            <li class="nav-item d-none d-sm-none d-lg-block">
                <a class="nav-link text-uppercase" href="{{ route('contato') }}">{{ __('CONTATO') }}</a>
            </li>

            <li class="nav-item d-none d-sm-none d-lg-block">
                <a class="nav-link text-uppercase" href="{{ route('blog') }}">{{ __('BLOG') }}</a>
            </li>
            
            <li class="loja nav-item dropdown d-sm-none d-lg-block ">
                <a class="nav-link text-uppercase" href="{{ route('loja') }}">{{ __('Loja') }}</a>
            </li>

            <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
                <div class="col">
                    <li class="nav-item d-none d-sm-none d-lg-block">
                        <ul class="list-unstyled list-inline social-icon-footer mt-lg-0 mt-3 b-6 mx-6 mx-lg-0 mb-md-0 text-end d-flex justify-content-lg-end justify-content-between">
                            <li class="list-inline-item mr-2">
                                <a class="text-decoration-none" target="_blank" href="{{ Config::get('config.whatsapp') }}">
                                    <img loading="lazy" alt="Whatsapp" src="{{ url('/assets/svg/whatsapp.svg') }}" width="30" height="100%">
                                </a>
                            </li>
                            <li class="list-inline-item mr-2">
                                <a class="text-decoration-none" target="_blank" href="https://pinterest.com/{{ Config::get('config.pinterest') }}">
                                    <img loading="lazy" alt="Pinterest" src="{{ url('/assets/svg/pinterest.svg') }}" width="30" height="100%">
                                </a>
                            </li>
                            <li class="list-inline-item mr-2">
                                <a class="text-decoration-none" target="_blank" href="https://www.youtube.com/{{ Config::get('config.youtube') }}">
                                    <img loading="lazy" alt="Youtube" src="{{ url('/assets/svg/youtube.svg') }}" width="30" height="100%">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-decoration-none" target="_blank" href="https://www.instagram.com/{{ Config::get('config.instagram') }}">
                                    <img loading="lazy" alt="Instagram" src="{{ url('/assets/svg/instagram.svg') }}" width="30" height="100%">
                                </a>
                            </li>
                        </ul>
                    </li>
                </div>
                <div><p class="m-0 mt-2 text-light fw-normal">(11) 5198-1408</p></div>
            </div>
        </ul>
    </div>
</nav>
