<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>WhatToQR</title>

    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link type="text/css" href="../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link type="text/css" href="../../vendor/notyf/notyf.min.css" rel="stylesheet">
    <link type="text/css" href="../../vendor/fullcalendar/main.min.css" rel="stylesheet">
    <link type="text/css" href="../../vendor/apexcharts/dist/apexcharts.css" rel="stylesheet">
    <link type="text/css" href="../../vendor/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link type="text/css" href="../../vendor/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
    <link type="text/css" href="../../vendor/leaflet/dist/leaflet.css" rel="stylesheet">
    <link type="text/css" href="../../css/volt.css" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-6"></script>

</head>

<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')
        <!-- Page Heading -->

        <!-- Page Content -->
        <main class="content">
            <div class="container">
                @if (session()->has('message'))
                    
                    <div class="alert alert-{{ session()->get('message_class') }} alert-dismissible text-white fade show"
                        role="alert">
                        <span class="alert-icon align-middle">
                            <span class="material-icons text-md">
                                thumb_up_off_alt
                            </span>
                        </span>
                        <span class="alert-text"><strong>Hello!</strong> {{ session()->get('message') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            @include('layouts.topnavigation')
            <div class="py-4">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg></a></li>
                        @if (isset($breadcrumb))
                            {{ $breadcrumb }}
                        @endif
                    </ol>
                    <div class="d-flex justify-content-between w-100 flex-wrap">
                        <div class="mb-3 mb-lg-0">
                            @if (isset($header))
                                <h6 class="font-weight-bolder mb-0">{{ $header }}</h6>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
            {{ $slot }}
        </main>
    </div>
    <script src="vendor/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/countup.js/dist/countUp.umd.js"></script>
    <script src="vendor/apexcharts/dist/apexcharts.min.js"></script>
    <script src="vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="vendor/simple-datatables/dist/umd/simple-datatables.js"></script>
    <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../../cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="vendor/fullcalendar/main.min.js"></script>
    <script src="vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="vendor/notyf/notyf.min.js"></script>
    <script src="vendor/leaflet/dist/leaflet.js"></script>
    <script src="vendor/svg-pan-zoom/dist/svg-pan-zoom.min.js"></script>
    <script src="vendor/svgmap/dist/svgMap.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/sortablejs/Sortable.min.js"></script>
    <script async defer="defer" src="../../buttons.github.io/buttons.js"></script>
    <script src="assets/js/volt.js"></script>


</body>

</html>
