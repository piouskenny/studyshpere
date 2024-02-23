<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>StudySphere</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('dashboard/dashboard.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html"><span>StudySphere</span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{ $_SERVER['REQUEST_URI'] == '/' ? 'active' : ''  }}" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link scrollto {{ $_SERVER['REQUEST_URI'] == '/courses' ? 'active' : ''  }}" href="{{ route('courses') }}">Courses</a></li>
                    <li><a class="nav-link scrollto  {{ $_SERVER['REQUEST_URI'] == '/login' ? 'active' : ''  }}"" href=" {{ route('login_page') }}">Dashboard</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    @yield('content')
    <!-- ======= Footer ======= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    {{-- <div id="preloader"></div> --}}

    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>

    {{--
    Dont forget Jquery CDN link
     --}}
</body>
</html>
