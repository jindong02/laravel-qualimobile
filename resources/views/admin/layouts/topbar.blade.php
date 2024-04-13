<header class="main-header">
    <div class="header-menu-top">
        <div class="header-top" id="headertop">
            <div class="left-side-logo-header main-sidebar">
                <div class="logo-area mt-2">
                    <img src="{{ url('assets/svg/logo-color.svg') }}" alt="Logo" />
                </div>
            </div>
            <nav class="navbar navbar-static-top p-0">
                <div class="right-side-menu-bar shadow">
                    <div class="header-menu">
                        <ul class="header-menu-list">
                            <!-- <li>
                                <a href="javascript:void(0)">
                                    @yield('title')
                                </a>
                            </li> -->

                            <li>
                                <div class="toggle-area d-sm-block d-md-none">
                                    <a href="javascript:void(0)" data-toggle="push-menu" role="button">
                                        <span></span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="notification-list">
                        <ul class="header-menu-list">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu card-animation" aria-labelledby="navbarDropdownMenuLink">
                                    <div class="admin-name">
                                        <h2>Administrator</h2>
                                    </div>
                                    <a class="dropdown-item" href="{{ route('admin.configuracoes.acesso') }}">
                                        <i class="user-icon fa fa-user" aria-hidden="true"></i>
                                        Acesso
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.configuracoes') }}">
                                        <i class="user-icon fa fa-cog" aria-hidden="true"></i>
                                        Configurações
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                        <i class="user-icon fa fa-sign-out" aria-hidden="true"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
