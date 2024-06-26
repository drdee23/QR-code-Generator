<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none"><a class="navbar-brand me-lg-5"
        href="../../index.html"><img class="navbar-brand-dark" src="../../assets/img/brand/light.svg" alt="Volt logo">
        <img class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="Volt logo"></a>
    <div class="d-flex align-items-center"><button class="navbar-toggler d-lg-none collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button></div>
</nav>
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div class="user-card d-flex d-md-none justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4"><img src="../../assets/img/team/profile-picture-3.jpg"
                        class="card-img-top rounded-circle border-white" alt="Bonnie Green"></div>
                <div class="d-block">
                    <h2 class="h5 mb-3">Hi, Jane</h2>
                    
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                    class="btn btn-secondary btn-sm d-inline-flex align-items-center"><svg
                        class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg> {{ __('Logout') }}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </div>
            <div class="collapse-close d-md-none"><a href="#sidebarMenu" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                    aria-label="Toggle navigation"><svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg></a></div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item"><a href="/" class="nav-link d-flex align-items-center"><span
                        class="sidebar-icon"><img src="{{ asset('assets/img/w.png') }}" height="30" width="30"
                            alt="Volt Logo">
                    </span><span class="mt-1 sidebar-text">WhatToQR</span></a></li>
            {{-- ////////////////////////////dashboard//////////////////////////////////// --}}
            <li class="nav-item"><a href="/" class="nav-link"><span><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg> </span><span class="sidebar-text">Dashboard</span></a></li>

            {{-- /////////////////////// --}}
            <li class="nav-item {{ in_array(Route::currentRouteName(), ['organisations']) ? 'active' : '' }}"><a href="{{route('organisations')}}"
                    class="nav-link d-flex align-items-center justify-content-between"><span><span
                            class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg> </span><span class="sidebar-text">Organisations</span></span></a></li>

            {{-- ////////////////////////////people//////////////////////////////////// --}}
            <li class="nav-item"><a href="" class="nav-link"><span class="sidebar-icon"><svg
                            class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                            </path>
                        </svg> </span><span class="sidebar-text">People</span></a></li>

            {{-- ////////////////////////////Events//////////////////////////////////// --}}
            <li class="nav-item "><span class="nav-link d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-dashboard"><span><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg> </span><span class="sidebar-text">Events</span> </span><span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></span></span>
                <div class="multi-level collapse {{ in_array(Route::currentRouteName(), ['events', 'events.show', 'events.edit']) ? 'show' : '' }}" role="list" id="submenu-dashboard" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ in_array(Route::currentRouteName(), ['events', 'event.show', 'event.edit']) ? 'active' : '' }}"><a href="{{route('events')}}" class="nav-link "><span
                                    class="sidebar-text-contracted">O</span> <span
                                    class="sidebar-text">Overview</span></a></li>
                        <li class="nav-item"><a href="traffic-sources.html" class="nav-link"><span
                                    class="sidebar-text-contracted">Q</span> <span class="sidebar-text">QR codes</span></a></li>
                        <li class="nav-item "><a href="app-analysis.html" class="nav-link"><span
                                    class="sidebar-text-contracted">P</span> <span class="sidebar-text">Personel</span></a></li>
                    </ul>
                </div>
            </li>

            {{-- ////////////////////////////QR generator//////////////////////////////////// --}}
            <li class="nav-item"><a href="/" class="nav-link"><span><span class="sidebar-icon"><svg
                                class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                </path>
                                <path
                                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                </path>
                            </svg> </span><span class="sidebar-text">QR codes</span></a></li>
        </ul>
    </div>
</nav>
