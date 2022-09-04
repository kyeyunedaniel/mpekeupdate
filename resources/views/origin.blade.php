<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>{{ config('app.name', 'MpekeXchange') }}</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets2/images/favicon.png" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="assets2/css/slick.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets2/css/LineIcons.css">

    <!--====== Material Design Icons CSS ======-->
    <link rel="stylesheet" href="assets2/css/materialdesignicons.min.css">

    <!--====== Jquery Ui CSS ======-->
    <link rel="stylesheet" href="assets2/css/jquery-ui.min.css">

    <!--====== nice select CSS ======-->
    <link rel="stylesheet" href="assets2/css/nice-select.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets2/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets2/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets2/css/style.css">

    <link rel="stylesheet" href="assets/css/bootstrap-5.0.0-alpha-2.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="assets/css/lindy-uikit.css"/>
    <link rel="stylesheet" href="assets/css/base-style.css"/>

</head>

<body>

    <!--====== Preloader Part Start ======-->
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== Preloader Part Ends ======-->

    <!--====== Navbar Style 7 Part Start ======-->
    <div class="navigation">
        <header class="navbar-style-7 position-relative">
            <div class="container">
                <!-- navbar mobile Start -->
                <div class="navbar-mobile d-lg-none">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <!-- navbar cart start -->
                            <div class="navbar-toggle icon-text-btn">
                                <a class="icon-btn primary-icon-text mobile-menu-open-7" href="javascript:void(0)">
                                    <i class="mdi mdi-menu"></i>
                                </a>
                            </div>
                            <!-- navbar cart Ends -->
                        </div>
                       
                        <div class="col-3">
                            <!-- navbar cart start -->
                           
                            <!-- navbar cart Ends -->
                        </div>
                    </div>
                    <!-- navbar search start -->
                    <div class="navbar-search mt-15 search-style-5">
                        <div class="search-select">
                            <select>
                                <option value="">All</option>
                                <option value="1">option 01</option>
                                <option value="2">option 02</option>
                                <option value="3">option 03</option>
                                <option value="4">option 04</option>
                                <option value="5">option 05</option>
                            </select>
                        </div>
                        <div class="search-input">
                            <input type="text" placeholder="Search">
                        </div>
                        <div class="search-btn">
                            <button><i class="lni lni-search-alt"></i></button>
                        </div>
                    </div>
                    <!-- navbar search Ends -->
                </div>
                <!-- navbar mobile Start -->
            </div>
    
            <div class="navbar-container navbar-sidebar-7">
                <!-- navbar close  Ends -->
                <div class="navbar-close d-lg-none">
                    <a class="close-mobile-menu-7" href="javascript:void(0)"><i class="mdi mdi-close"></i></a>
                </div>
                <!-- navbar close  Ends -->
    
                <!-- navbar top Start -->
                <div class="navbar-top-wrapper">
                    <div class="container-lg">
                        <div class="navbar-top d-lg-flex justify-content-between">
                            <!-- navbar top left Start -->
                            <div class="navbar-top-left">
                                <!-- <ul class="navbar-top-link">
                                    <li><a href="about-page.html">About</a></li>
                                    <li><a href="contact-page.html">Contact</a></li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="mdi mdi-phone-in-talk"></i>
                                            +8801234567890
                                        </a>
                                    </li>
                                </ul> -->
                            </div>
                            <!-- navbar top left Ends -->
                            <!-- navbar top right Start -->
                            <div class="navbar-top-right">
                                <ul class="navbar-top-link">
                                    
                                    <!-- Authentication Links -->
                                    @guest
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif
                                        
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">About us</a></li>
                                    @else
                                        <li class="nav-item dropdown">                               
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                            <!-- navbar top right Ends -->
                        </div>
                    </div>
                </div>
                <!-- navbar top Ends -->
    
                <!-- main navbar Start -->
                <div class="navbar-wrapper">
                    <div class="container-lg">
                        <nav class="main-navbar d-lg-flex justify-content-between align-items-center">
                            <!-- desktop logo Start -->
                            <div class="desktop-logo d-none d-lg-block">
                                 <a class="navbar-brand" href="{{ url('/') }}">
                                    <img height="80px" width="100px" src="{{asset('photos/com_log.jpeg')}}">
                                </a>
                            </div>
                            <div class="navbar-search-cart d-none d-lg-flex">
                                <!-- navbar search start -->
                                <div class="navbar-search search-style-5">
                                    <div class="search-select">
                                        <select>
                                            <option value="">All</option>             
                                        </select>
                                    </div>
                                    <div class="search-input">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <div class="search-btn">
                                        <button><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                               
                                <!-- navbar cart Ends -->
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- main navbar Ends -->
            </div>
            <div class="overlay-7"></div>
        </header>
    </div>
    <!--====== Navbar Style 7 Part Ends ======-->
<!-- {{asset('photos/')}} -->
    <!--====== Header Style 1 Part Start ======-->
    <section class="header-style-1">
        <div class=" row header-big">
            <div  class="header-items-active">
                <div   class="single-header-item bg_cover"
                    style="background-image: url(photos/mpererwe.jpg); height: 350px;">
                    <div class="header-item-content">
                        <h3 class="title">Welcome to MpekeXchange </h3>
                        <a href="javascript:void(0)" class="link"> Grain quality matters</a>
                    </div>
                </div>
                <div class="single-header-item bg_cover"
                    style="background-image: url(photos/mpererwe.jpg);height: 350px;">
                    <div class="header-item-content">
                        <h3 class="title">Welcome to MpekeXchange </h3>
                        <a href="javascript:void(0)" class="link">Grain quality matters</a>
                    </div>
                </div>
                <div class="single-header-item bg_cover"
                    style=" background-image: url(photos/mpererwe.jpg);height: 350px;">
                    <div class="header-item-content">
                        <h3 class="title">Welcome to MpekeXchange </h3>                        
                        <a href="javascript:void(0)" class="link">Grain quality matters</a>
                    </div>
                </div>
            </div>
        </div>
      <!--   <div class="header-min">
            <div class="header-min-item product-style-25 bg_cover"
                style="background-image: url(assets/images/header-1/header-min-1.jpg);">
                <div style="width:; " class="product-content">
                    <p>Thanks for visiting us</p>
                </div>
            </div>
            <div class="header-min-item product-style-25 bg_cover"
                style="background-image: url(assets/images/header-1/header-min-2.jpg);">
                <div class="product-content">
                    <p>A user(buyer, farmer and warehouse manager) creates an account by filling in the required fields as shown in the figure below,<br/> Clicks submit button to continue and data captured is saved.</p>
                </div>
            </div>
        </div> -->
    </section>
    <!--====== Header Style 1 Part Ends ======-->

    <div class="row">
        <div class="col-lg-8 ">
               <!--====== Content Card Style 4 Part Start ======-->
    <section class="content-card-style-4 pt-70 pb-100">
        <div class="container">
            <h4>Visit the nearest warehouse for quality grains</h4>
            <div class="row justify-content-center">
                @foreach($ware_hous as $pdt)
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-content mt-15 text-center">
                        <div class="content-icon">
                            <img style=" margin-top: 5px;margin-left: 7px" height="100px" width="100px" src="@if($pdt->logo){{asset($pdt->logo)}}@else{{asset('upload/images/lunkuse_viola_1625539581.jpg')}}@endif">
                        </div>
                        <div class="content-content">
                            <h4 class="title"><a href="javascript:void(0)">{{$pdt->name}} </a></h4>
                            @foreach($pro as $pr)
                            @if($pr->Warehouse_id==$pdt->id)
                            <p style=" margin-top: 5px"> <strong>Name: </strong>
                                {{$pr->name}} 
                            </p>
                            <p> <strong>Price: </strong>{{$pr->price}} Ugx @kg</p>
                            
                            @endif

                             @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </section>
        </div>
        <div class="col-lg-4" >
               <!--====== Content Card Style 4 Part Start ======-->
    <section class="content-card-style-4 pt-70 pb-100">
        <div class="container">
            <h5>Advertisements</h5>
            <div class="row justify-content-center">
                
                <div class="col-lg-6 col-md-7 col-sm-8">
                    <div class="single-content mt-15 text-center">
                        <div class="content-icon">
                            <img style=" margin-top: 5px;margin-left: 7px" height="100px" width="100px" src="@if($pdt->logo){{asset($pdt->logo)}}@else{{asset('upload/images/lunkuse_viola_1625539581.jpg')}}@endif">
                        </div>
                        <div class="content-content">
                            <h4 class="title"><a href="javascript:void(0)">Title </a></h4>
                            
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </section>
        </div>
        
    </div>
    

    <!--====== Subscribe Part Ends ======-->

    <!--====== Footer Style 3 Part Start ======-->
    <footer class="footer footer-style-4 footer-dark">
      <div class="container">
        <div class="widget-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="footer-widget">
                <div class="logo">
                  <a href="#0"> <img height="80px" width="100px" src="{{asset('photos/com_log.jpeg')}}"> </a>
                </div>
                <div style="color: white; ">
                    <h6 class="desc">Contact Us</h6>
                <div class="row2">
                    <strong>Address:</strong> Plot 3377, Makerere-Kampala,Uganda
                </div>
                <div class="row3">
                    <strong>Email:</strong> info@mpexchange.com
                </div>
                <div class="row4">
                    <strong>Telephone:</strong> +256-000-000000
                </div> <strong>Social media:</strong>
                </div>
                <ul class="socials">
                  <li> <a href="#0"> <i class="lni lni-facebook-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-twitter-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-instagram-filled"></i> </a> </li>
                  <li> <a href="#0"> <i class="lni lni-linkedin-original"></i> </a> </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6 col-sm-6">
              <div class="footer-widget">
                <h6>Quick Link</h6>
                <ul class="links">
                  <li> <a href="#0">Home</a> </li>
                  <li> <a href="#0">About</a> </li>
                  <li><a href="#">Privacy Policy</a>
                  <li><a href="#"> Terms &amp; Conditions</a></li>
                  <li> <a href="#0">Contact</a> </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-1 col-lg-3 col-md-6 col-sm-6">
              <div class="footer-widget">
               
              </div>
            </div>
            <div class="col-xl-5 col-lg-3 col-md-6">
              <div class="footer-widget">
                <h6  style="margin-left: 95px;">Download App</h6>
                <ul class="download-app">
                  <li>
                    <a href="#0">
                      <span class="icon"><i class="lni lni-apple"></i></span>
                      <span class="text">Download on the <b>App Store</b> </span>
                    </a>
                    <a href="#0">
                      <span class="icon"><i class="lni lni-play-store"></i></span>
                      <span class="text">GET IT ON <b>Play Store</b> </span>
                    </a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright-wrapper">
            <div class="row">
                                <div class="col-md-4 col-lg-3">
                                    <div class="copyright-text">
                                        <p></p>
                                        <p class="mb-0">Copyright &copy; MpekeXchange {{now()->format( 'Y')}}</p>
                                    </div>
                                </div>     

                                 <div  class="col-md-3 col-lg-3">
                                    <div  class="copyright-menu">
                                        <p></p>
                                        <ul style="list-style-type: none;" class="policy-menu">
                                          
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-3">
                                    <div class="copyright-menu">
                                        <p></p>
                                        <ul style="list-style-type: none;" class="policy-menu">
                                            
                    &middot;
                                        </ul>
                                    </div>
                                </div>
                                <div  class="col-md-3 col-lg-3">
                                
                                    <!-- Copyright Menu -->
                                    <div  class="copyright-menu">
                                        <p></p>
                                        <ul style="list-style-type: none;" class="policy-menu">
                                            <li>powered by <a  target="_blank" href="">MpekeXchange</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>        
      </div>
      </div>
    </footer>
    <!--====== Footer Style 3 Part Ends ======-->

    <!--====== Bootstrap 5 js ======-->
    <script src="assets2/js/popper.min.js"></script>
    <script src="assets2/js/bootstrap.min.js"></script>

    <script src="assets/js/bootstrap.5.0.0.alpha-2-min.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>


    <!--====== Jquery js ======-->
    <script src="assets2/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets2/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Slick js ======-->
    <script src="assets2/js/slick.min.js"></script>

    <!--====== Accordion Steps Form js ======-->
    <script src="assets2/js/jquery-vj-accordion-steps.js"></script>

    <!--====== Jquery Ui js ======-->
    <script src="assets2/js/jquery-ui.min.js"></script>

    <!--====== Form validator js ======-->
    <script src="assets2/js/jquery.form-validator.min.js"></script>

    <!--====== nice select js ======-->
    <script src="assets2/js/jquery.nice-select.min.js"></script>

    <!--====== formatter js ======-->
    <script src="assets2/js/jquery.formatter.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets2/js/count-up.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets2/js/main.js"></script>

</body>

</html>
