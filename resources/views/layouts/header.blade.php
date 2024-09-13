    <!-- Header Start !-->
    <header class="header-area">
        <!-- Header Nav Menu Start -->
        <div class="header-menu-area sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-6 col-6 d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ route('inicio') }}" class="standard-logo"><img
                                    src="{{ asset('assets/img/nav-logo.png') }}" alt="logo" class="img-fluid"></a>
                            <a href="{{ route('inicio') }}" class="sticky-logo"><img
                                    src="{{ asset('assets/img/nav-logo.png') }}" alt="logo" class="img-fluid"></a>
                            <a href="{{ route('inicio') }}" class="retina-logo"><img
                                    src="{{ asset('assets/img/nav-logo.png') }}" alt="logo" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-6 col-6 d-flex align-items-center justify-content-end">
                        <div class="menu d-inline-block">
                            <nav id="main-menu" class="main-menu">
                                <ul class="list-unstyled m-0">
                                    <li
                                        class="{{ Request::is('inicio') ? 'active' : '' }}">
                                        <a href="{{ route('inicio') }}"
                                            class="text-sm">Inicio</a>
                                    </li>
                                    <li class="{{ Request::is('nosotros') ? 'active' : '' }}">
                                        <a href="{{ route('nosotros') }}"
                                            class="text-sm">Nosotros</a>
                                    </li>
                                    <li>
                                        <a href="">Servicios</a>

                                        <ul>
                                            @forelse ($menus as $item)
                                                <li
                                                    class="{{ Request::is($item->slug) ? 'active' : '' }}">
                                                    <a style="font-size: 14px !important;"
                                                        href="{{ route('menu.show', ['slug' => $item->slug]) }}"
                                                        class="text-sm">{{ $item->name }}</a>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                    <li
                                        class="{{ Request::is('contact') ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}"
                                            class="text-sm">Contacto</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu-bar d-lg-none text-end">
                            <a href="#" class="mobile-menu-toggle-btn"><i class="fal fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="menu-sidebar-area">
        <div class="menu-sidebar-wrapper">
            <div class="menu-sidebar-close">
                <button class="menu-sidebar-close-btn" id="menu_sidebar_close_btn">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="menu-sidebar-content">
                <div class="menu-sidebar-logo">
                    <a><img src="{{ asset('assets/img/nav-logo.png') }}" alt="logo"></a>
                </div>
                <div class="mobile-nav-menu"></div>
                <div class="menu-sidebar-content">
                    <div class="menu-sidebar-single-widget">
                        <h5 class="menu-sidebar-title">Contacto</h5>
                        <div class="header-contact-info">
                            <span><i class="fa-solid fa-location-dot"></i>Av. 27, Juárez, Centro, 29960 Palenque,
                                Chiapas.</span>
                            <span><a href="mailto:rutasdelsureste@live.com.mx"><i
                                        class="fa-solid fa-envelope"></i>rutasdelsureste@live.com.mx</a> </span>
                            <span><a href="tel:+52916 129 1321"><i class="fa-solid fa-phone"></i>9163412188</a></span>
                        </div>
                        <div class="social-profile">
                            <a href="https://www.facebook.com/profile.php?id=100063763680077"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/rutasmayass/"><i class="fa-brands fa-instagram"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu Sidebar Section Start -->
    <div class="body-overlay"></div>
