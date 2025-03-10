<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from rockstheme.com/rocks/Invest Smart-live/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Mar 2020 08:27:42 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('user-assets') }}/img/logo/fc-logo.png">

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/bootstrap.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/owl.transitions.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/animate.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/meanmenu.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/flaticon.css">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/magnific.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ url('user-assets') }}/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ url('user-assets') }}/css/responsive.css">

    <!-- modernizr css -->
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    <script src="{{ url('user-assets') }}/js/vendor/modernizr-2.8.3.min.js"></script>

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>

    <!--[if lt IE 8]>
   <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="{{ url('user-assets') }}/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

    {{-- <div id="preloader"></div> --}}

    <header class="header-one">
        <!-- Start top bar -->
        <div class="topbar-area fix hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="topbar-left">
                            <ul>
                                <li><a href="{{ url('user-assets') }}/#"><i class="fa fa-envelope"></i> info@Invest
                                        Smart4.com</a></li>
                                <li><a href="{{ url('user-assets') }}/#"><i class="fa fa-phone"></i>
                                        +000-000-0000</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class=" col-md-6 col-sm-6">
                        <div class="topbar-right">
                            <div class="top-social">
                                <ul>
                                    <li><a href="{{ url('user-assets') }}/#"><i class="fa fa-skype"></i></a></li>
                                    <li><a href="{{ url('user-assets') }}/#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="{{ url('user-assets') }}/#"><i class="fa fa-google"></i></a></li>
                                    <li><a href="{{ url('user-assets') }}/#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ url('user-assets') }}/#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End top bar -->
        <!-- header-area start -->
        <div id="sticker" class="header-area header-area-2 hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            <!-- logo start -->
                            <div class="col-md-2 col-sm-2">
                                <div class="logo">
                                    <!-- Brand -->
                                    <a class="navbar-brand page-scroll white-logo" href="{{ route('index.get') }}">
                                        <img src="{{ url('user-assets') }}/img/logo/logo.png" alt="">
                                    </a>
                                    <a class="navbar-brand page-scroll black-logo" href="{{ route('index.get') }}">
                                        <img src="{{ url('user-assets') }}/img/logo/logo.png" alt="">
                                    </a>
                                </div>
                                <!-- logo end -->
                            </div>
                            <div class="col-md-10 col-sm-10">
                                <div class="header-right-link">
                                    <!-- search option end -->
                                    @if (Auth::check() && Auth::user())
                                        <a class="s-menu" href="{{ route('dashboard.get') }}">Dashboard</a>
                                    @else
                                        <a class="s-menu" href="{{ route('login.get') }}">Login</a>
                                    @endif
                                </div>
                                <!-- mainmenu start -->
                                <nav class="navbar navbar-default">
                                    <div class="collapse navbar-collapse" id="navbar-example">
                                        <div class="main-menu">
                                            <ul class="nav navbar-nav navbar-right">
                                                <li><a class="pages" href="{{ route('index.get') }}">Home</a>
                                                </li>
                                                <li><a href="{{ route('about.get') }}">About us</a></li>
                                                <li><a href="{{ route('packages.get') }}">Packages</a>
                                                </li>
                                                <li><a class="pages" href="#">How It
                                                        Works</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="{{ route('team.get') }}">team</a>
                                                        </li>
                                                        <li><a href="{{ route('faq.get') }}">FAQ</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="pages" href="{{ route('gallery.get') }}">Gallery</a>
                                                </li>
                                                <li><a href="{{ route('contact.get') }}">contacts</a>
                                                </li>
                                                {{-- <li>
                                                    <form action="{{ route('switchLang') }}" method="POST">
                                                        @csrf
                                                        <select name="language" onchange="this.form.submit()">
                                                            <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                                                            <option value="ur" {{ session('locale') == 'ur' ? 'selected' : '' }}>اردو</option>
                                                        </select>
                                                    </form>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!-- mainmenu end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
        <!-- mobile-menu-area start -->
        <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <div class="logo">
                                <a href="{{ route('index.get') }}"><img
                                        src="{{ url('user-assets') }}/img/logo/logo.png" alt="" /></a>
                            </div>
                            <nav id="dropdown">
                                <ul>
                                    <li><a class="pages" href="{{ route('index.get') }}">Home</a>
                                    </li>
                                    <li><a href="{{ route('about.get') }}">About us</a></li>
                                    <li><a href="{{ route('packages.get') }}">Packages</a></li>
                                    <li><a class="pages" href="#">How It Works</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('team.get') }}">team</a></li>
                                            <li><a href="{{ route('faq.get') }}">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="pages" href="{{ route('gallery.get') }}">Gallery</a>
                                    </li>
                                    <li><a href="{{ route('contact.get') }}">contacts</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area end -->
    </header>
    <!-- header end -->
