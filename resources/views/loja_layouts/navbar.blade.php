<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-dark fixed-top pb-4 pt-2 bg-primary" data-navbar-on-scroll="data-navbar-on-scroll">
    <div id="containerMobile" class="container mt-lg-2" style="display: flex; align-items: center;">
        
        {{-- <ul class="navbar-nav me-auto md-align-items-center"> --}}
            
            <div class="navbar-nav me-auto md-align-items-center ">
                <a aria-label="Logo" class="navbar-brand logo logo-menu-mobile me-7" href="{{ route('index') }}">
                    <img alt="Logo" src="{{ url('assets/svg/logo-white.svg') }}" width="250" height="100%">
                </a>
            </div>
            <div class="navbar-nav me-auto md-align-items-center ">
                @include('loja_layouts.navigation')
            </div>
           

            <div class="navbar-nav me-auto md-align-items-center " style="display: flex;justify-content: center;align-items: center;flex-direction: column; float:right;">
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
        {{-- </ul> --}}
    </div>
</nav>
