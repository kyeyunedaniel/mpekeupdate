<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MpekeXchange</title>

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script type='text/javascript' src='/js/jquery.mousewheel.min.js'></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link href="{{ asset('css/global.css') }}" type="text/css" rel="stylesheet">
   <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets2/images/com_log.jpeg" type="image/jpeg">

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
    <script>
        $(document).ready(function() {
$('.mdb-select').materialSelect();
});
    </script>

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
    <style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 650px; /* New width for default modal */
        }
    }
</style>
<script>
    $(function() {
  $('.selectpicker').selectpicker();
});
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />



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

                     <form method="GET" action="{{route('search')}} " class="submit">
                                <!-- @csrf -->
                                
                            <div class="navbar-search-cart d-none d-lg-flex">
                                <!-- navbar search start -->
                            
                                <div class="navbar-search search-style-5">
                                     <div style="margin-right:40px" class="search-input">
                                          <select style="width: 100%;" class="form-control select2 productcategory" id="prod_cat_id">		
                                                  <option value="0" disabled="true" selected="true">search by district</option>
                                                  @foreach($districts as $cat)
                                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                  @endforeach

                                         </select>
                                          
                                     </div>&nbsp;&nbsp;
                                    
                                    <div style="margin-right:3px" class="search-input">
                                          <select style="width: 100%;" class="form-control select2" id="">		
                                                  <option value="0" disabled="true" selected="true">search by name</option>
                                                  @foreach($ware_hous as $cat)
                                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                  @endforeach

                                         </select>
                                     </div>
                                    <div style="margin-top: ; " class="search-btn">
                                        <button class="submit"><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                               
                                <!-- navbar cart Ends -->
                            </div>
                        </form>
                    
                    <!-- <div class="navbar-search mt-15 search-style-5">
                          <div style="margin-right:40px" class="search-input">
                            <select style="width: 100%;" class="form-control select2 productname " id="prod_cat_id">

                                    <option value="0" disabled="true" selected="true">select by district</option>
                                    @foreach($districts as $cat)
                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                    @endforeach

                            </select>
                            
                        </div>
                       
                        
                        <div style="margin-left:70px" class="search-input">
                              <select style="width: 100%;" class="form-control select2 productname" id="">		
                                    <option value="0" disabled="true" selected="true">search by name</option>
                                    @foreach($ware_hous as $cat)
                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                    @endforeach

                            </select>  
                        </div>
                        <div class="search-btn">
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </div>
                    </div>
                </form> -->
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
                                        <li class="nav-item"><a class="nav-link" href="#about">About us</a></li>
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
                           
                            <form method="get" action="{{route('search')}} " class="submit">
                                <!-- @csrf -->
                                
                            <div class="navbar-search-cart d-none d-lg-flex">
                                <!-- navbar search start -->
                            
                                <div class="navbar-search search-style-5">
                                     <div style="margin-right:-15px" class="row ">
                                          <select style="max-width:165px;margin-right:50px" class=" form-control select2 productcategory" id="prod_cat_id">		
                                                  <option value="0" disabled="true" selected="true">search by district</option>
                                                  @foreach($districts as $cat)
                                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                  @endforeach

                                         </select> &nbsp;&nbsp;&nbsp;&nbsp;

                                          <select name="search" id="productname" style="max-width:165px;" class="form-control select2 productname" >		
                                                  <option value="0" disabled="true" selected="true">search by name</option>
                                                    @foreach($ware_hous as $cat)
                                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                  @endforeach


                                         </select>
                                        
                                          
                                     </div>
                                    <div style="margin-top: ;margin-left:8px " class="search-btn">
                                        <button class="submit"><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                               
                                <!-- navbar cart Ends -->
                            </div>
                        </form>
                        </nav>
                    </div>
                </div>
                <!-- main navbar Ends -->
            </div>
            <div class="overlay-7"></div>
        </header>
    </div>
    <!--====== Navbar Style 7 Part Ends ======-->
<body>

<!-- <center>
	<h1>Laravel Dynamic Drop Down with ajax</h1>

	<span>Product Category: </span>
	<select style="width: 200px" class=" form-control select2 productname " id="prod_cat_id">
		
		<option value="0" disabled="true" selected="true">-Select-</option>
		@foreach($districts as $cat)
			<option value="{{$cat->name}}">{{$cat->name}}</option>
		@endforeach

	</select>	

</center> -->
<!-- {{asset('photos/')}} -->


      <section >
         <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#main_slider" data-slide-to="0" class="active"></li>
               <li data-target="#main_slider" data-slide-to="1"></li>
               <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="row marginii">
                        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="carousel-caption justify-content-left">
                              <h4>Welcome To <i>MpekeXchange</i></h4>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
                              <a class="btn btn-lg btn-primary" href="#Contract" role="button"> Contract</a>
                              <a class="btn btn-lg btn-primary" href="#" role="button"> Warehouse</a>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box">
                              <figure><img height='300px' width='600px' src="photos/mpererwe.jpg" alt="img"/></figure>
                           </div>
                        </div> -->
                        <div class="single-header-item bg_cover"
                    style="background-image: url(photos/mpererwe.jpg);height: 350px;">
                    <div style="margin-top:250px;color:white" class="header-item-content">
                        <h3 style="color:white" class="title">Welcome to MpekeXchange </h3>
                        <a style="color:white" href="javascript:void(0)" class="link">Grain quality matters</a>
                    </div>
                </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row marginii">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="carousel-caption ">
                              <h4>Welcome To <i>MpekeXchange</i></h4>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
                              <a class="btn btn-lg btn-primary" href="#Contract" role="button"> Contract</a>
                              <a class="btn btn-lg btn-primary" href="#" role="button"> Warehouse</a>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box ">
                              <figure><img height='300px' src="photos/maize-998x570.jpg" alt="img"/></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row marginii">
                        <!-- <div class="col-xl-6 col-lg-6 col-md- col-sm-12">
                           <div class="carousel-caption ">
                              <h4>Welcome To <i>MpekeXchange</i></h4>
                              <p>It is a long established fact that a reader will be distracted <br>by the readable content of a page when looking at its layout.<br> The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>
                              <a class="btn btn-lg btn-primary" href="#Contract" role="button"> Contract</a>
                              <a class="btn btn-lg btn-primary" href="#" role="button"> Warehouse</a>
                           </div>
                        </div> -->
                            <div class="single-header-item bg_cover"
                            style=" background-image: url('{{asset('photos/Maize-plants-1.jpeg')}}');height: 350px;">
                            <div style="margin-top:120px;" class="header-item-content" style="background-color:;text-align:center;width:450px">
                                <h3 style="color:white" class="title">Welcome to MpekeXchange </h3>                        
                                <a style="color:white" href="javascript:void(0)" class="link">Grain quality matters</a>
                                 <p style="color:white">It is a long established fact that a reader will be distracted<br> by the readable content of a page when looking at its layout.<br> The point of using Lorem Ipsum is that it has a more-or-less <br>normal distribution of letters, as opposed to using</p>
                              <a class="btn btn-lg btn-primary" href="#Contract" role="button"> Contract</a>
                              <a class="btn btn-lg btn-primary" href="#" role="button"> Warehouse</a>
                            </div>
                        </div>
                        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box">
                              <figure><img height='300px' src="photos/Maize-plants-1.jpeg" alt="img"/></figure>
                           </div>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i style="color:black;font-size:200%;margin-right:120px" class='fa fa-angle-left'></i></a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i style="color:black;font-size:200%;margin-left:120px" class='fa fa-angle-right'></i>
            </a>
         </div>
      </section>
      <div class="mouse-wheel text-tright"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--bi" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16" data-icon="bi:arrow-down"><g fill="currentColor"><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path></g></svg></div>



    <div id="Contract" class="Contract row">
        <div class="col-lg-8 ">
               <!--====== Warehouse Content Card  Part Start ======-->
                <section class="content-card-style-4 pt-70 pb-100">
                    <div class="container">
                        <h4 style="margin-bottom:30px; margin-left:5px">Visit the nearest warehouse for quality grains</h4>
                        <div class="row justify-content-center">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">

                                    @foreach($ware_hous as $photo )

                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>

                                    @endforeach

                                </ol>

                                <div class="carousel-inner" role="listbox">

                                        @foreach($ware_hous as $photo )

                                                <div style='margin-left:45px'  class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                    <a href="{{route('warehouse-list',$photo->id)}}">
                                                        <img  class="d-block" height="200" src="{{ $photo->logo }}" alt="{{ $photo->name }}" width="350"  >
                                                    </a>

                                                    <a href="{{route('warehouse-list',$photo->id)}}">
                                                        <div style="margin-left:75px" class="carousel-caption d-none d-md-block">
                                                            
                                                            @forelse($pro as $pr)
                                                            @if($pr->Warehouse_id==$photo->id)
                                                            <p style=" margin-top: 5px"> <strong>Name: </strong>
                                                                {{$photo->name}}
                                                            </p>
                                                            <p> <strong>Price: </strong>{{$pr->price}} Ugx @kg</p>
                                                            <p> <strong>Discount: </strong>0%</p>

                                                            @endif
                                                            @empty
                                                            <p>No grains attached</p>

                                                            @endforelse

                                                            </div>
                                                    </a>       

                                                </div>

                                        @endforeach

                                </div>

                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">

                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>

                                    </a>

                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">

                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                            </div>
                
                            <!-- @foreach($ware_hous as $pdt)
                            <div class="col-lg-4 col-md-7 col-sm-8">
                                <div class="single-content mt-15 text-center">
                                    <a class="btn btn-sm bg-success-light text-info" data-toggle="modal" href="{{route('warehouse-list',$pdt->id)}}" data-target="#edit_specialities_details{{$pdt->id}}">
                                    <!-- <a href="{{ route('warehouse-list', $pdt->id) }}"> -->
                                    <!-- <div class="content-icon">
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
                                        <p> <strong>Discount: </strong>0%</p>
                                        
                                        @endif
                                        @endforeach
                                    </div>
                                    </a>
                                </div>
                            </div> -->

                            <!-- @endforeach  -->

                        
                        </div>
                    </div>
                </section>
                
<!--====== Contact Content Card Style Start ======-->
                <section  class=" content-card-style-4 pt-70 pb-100">
                    <div class="container">
                        <h4 style="margin-bottom:30px; margin-left:5px">Available Contracts with quality grains</h4>
                        <div class="row justify-content-center">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">

                @foreach( $contracts as $contract )

                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>

                @endforeach

                </ol>

                <div class="carousel-inner" role="listbox">

                    @foreach( $contracts  as $contract)
                    

                    <div style='margin-right:904%'   class="carousel-item {{ $loop->first ? 'active' : '' }}">

                        <img class="" height="200" src="" alt="" width="0" >
                        <!-- photos/Maize-plants-1.jpeg -->

                           <a href="{{route('contracts.contracts_edit.Buyer',$contract->id)}}"> <div style="margin-left:75px" class="carousel-caption d-none d-md-block">

                                
                            @foreach($ware_hous as $photo)
                            
                            @if($contract->warehouse_id == $photo->id)
                             <p style=" margin-right: 220px"> <strong>Warehouse Name: </strong>
                                    
                                    {{$contract->name}}
                                
                                    </p>
                                    @endif

                             @endforeach
                                    
                                    <p> <strong>Maize Brand: </strong>{{$contract->MaizeType}} </p>
                                    <p><strong>Maize Quantity:</strong> {{$contract->quantity}} Kgs </p>
                                    <p><strong>Price:</strong>{{$contract->price}} Ugx/kg</p>
                                    <p><strong>Date Available:</strong>{{$contract->date_available}}</p>
                            </div>



                    </div></a>



                    @endforeach



                </div>



                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">



                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>


                    <span class="sr-only">Previous</span>


                </a>



                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">


                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

                    <span class="sr-only">Next</span>


                </a>



                </div>
                            <!-- @foreach($ware_hous as $pdt)
                            <div class="col-lg-4 col-md-7 col-sm-8">
                                <div class="single-content mt-15 text-center">
                                    <a class="btn btn-sm bg-success-light text-info" data-toggle="modal" href="{{route('warehouse-list',$pdt->id)}}" data-target="#edit_specialities_details{{$pdt->id}}">
                                    <!-- <a href="{{ route('warehouse-list', $pdt->id) }}"> -->
                                    <!-- <div class="content-icon">
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
                                        <p> <strong>Discount: </strong>0%</p>
                                        
                                        @endif
                                        @endforeach
                                    </div>
                                    </a>
                                </div>
                            </div> -->

                            <!-- @endforeach  -->

                        
                        </div>
                    </div>
                </section>
         

            </div>

        
                <div class="col-lg-4" >
                    <!--====== Content Card Style 4 Part Start ======-->
                    <section class="content-card-style-4 pt-70 pb-100">
                        <div class="container">
                                <h4 style="margin-bottom:30px; margin-left:40%">Adverts</h4>
                        
                            <div class="row" style="height:200px;overflow:auto;">
                                <!-- class="item" data-aos="fade-up" -->
                                <div  class="col-lg-6 col-md-7 col-sm-8" >
                                    <h5 style="margin-left:25%" >Transporter</h5>
                                    @forelse($advert as $pdt)
                                    <div class="single-content mt-15 text-center">
                                        <div class="content-icon">
                                        <a  target="_blank" href="{{$pdt->image}} "> <img style=" margin-top: 5px;margin-left: 7px" height="100px" width="100px" src="@if($pdt->image){{asset($pdt->image)}}@else{{asset('upload/images/lunkuse_viola_1625539581.jpg')}}@endif"></a>
                                        </div>
                                        <div class="content-content">
                                            <!-- <p class=""><strong>Name:</strong><i style="color:darkgrey"> {{$pdt->name}}</i></p> -->
                                            <p class=""><strong>Location:</strong><i style="color:darkgrey"> {{$pdt->location}}</i></p>
                                            <!-- <p class=""><strong>Category</strong></p><i style="color:darkgrey"> {{$pdt->category}}</i> -->
                                            <p class=""><a  target="_blank" href="{{route('transporter',$pdt->id)}}"> ..see more</a></p>
                                            
                                        </div>
                                    </div>
                                    @empty
                                        <p>No Transporter registered yet</p>
                                    @endforelse
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-8">
                                    <h5 style="margin-left:25%" >Processors</h5>
                                    
                                        @forelse($Processors as $pdt)
                                        <div class="single-content mt-15 text-center">
                                            <div class="content-icon">
                                            <a  target="_blank" href="{{$pdt->image}} "> <img style=" margin-top: 5px;margin-left: 7px" height="100px" width="100px" src="@if($pdt->image){{asset($pdt->image)}}@else{{asset('upload/images/lunkuse_viola_1625539581.jpg')}}@endif"></a>
                                            </div>
                                            <div class="content-content">
                                                <!-- <p class="">Name:<i style="color:darkgrey">{{$pdt->name}}</i> </p> -->
                                                <p class="">Location:<i style="color:darkgrey"> {{$pdt->Location}}</i> </p>
                                                <!-- <p class="">Category:<i style="color:darkgrey">{{$pdt->category}} <i></i></p> -->
                                                <p class=""><a  target="_blank" href="{{route('processor',$pdt->id)}}"> ..see more</a></p>
                                                
                                            </div>
                                        </div>
                                    @empty
                                        <p>No Processor registered yet</p>
                                    @endforelse
                                </div>
                            
                            </div>
                        </div>
                    </section>
                </div>      
        
    </div>

    <div id="about" class=" about col-12">
 <section class="doctors-col count-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="doctors-title ">
                            <!-- <h3 style="font-weight: 900; color: #f3c41b;">Meet Our Partners.</h3>
                        -->
                        <h4 style="margin-bottom:30px; margin-left:5px">Meet Our Partner</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="doctor-slider slider">
                                
                                <div style="margin-bottom:20px;overflow: hidden;" class="doc-img" style="background-color: white">
                                    <img height="150px" width="150px" class="img-fluid" alt="User Image" src="{{asset('photos/springtime.png')}}">
                                    <img style="margin-left:60px" height="100px" width="100px" class="img-fluid" alt="User Image" src="{{asset('assets/img/favicon.svg')}}">
                                    <img style="margin-left:60px" height="100px" width="100px" class="img-fluid" alt="User Image" src="{{asset('assets/img/airtel.png')}}">
                                    <img style="margin-left:60px" height="100px" width="100px" class="img-fluid" alt="User Image" src="{{asset('assets/img/NET logo.png')}}">
                                        <img style="margin-left:60px" height="100px" width="100px" class="img-fluid" alt="User Image" src="{{asset('assets/img/rent01.jpg')}}">
                                        <img style="margin-left:60px" height="100px" width="70px" class="img-fluid" alt="User Image" src="{{asset('assets/img/airtel.png')}}">
                                    <img style="margin-left:60px" height="100px" width="70px" class="img-fluid" alt="User Image" src="{{asset('assets/img/NET logo.png')}}">
                                        <!-- <img style="margin-left:60px" height="100px" width="100px" class="img-fluid" alt="User Image" src="{{asset('assets/img/rent01.jpg')}}"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
</div>

<section  class=" content-card-style-4 pt-70 pb-100">
        <div class="container">
            <div class="row">                
                <div class="col-12 col-lg-12">
                    <div style="margin-right:'120px" class="">

                    <h4>Terms & Conditions</h4> 
                    <p>
                        Please read the following terms and conditions carefully as it sets out the terms 
                        of a legally binding agreement between you (the reader) and Business Standard Private Limited.
                    </p>
                    </div>
                </div>
            </div>
            <div class="row">                
                <div class="col-12 col-lg-12">
                    <div style="margin-right:'120px" class="">
                    <h6>Registration Access and Use</h6>
                    <p>
                        We welcome users to register on our digital platforms. We offer the below mentioned registration services which may be subject to change in the future.
                        All changes will be appended in the terms and conditions page and communicated to existing users by email.
                    </p>
                    <p>
                        Registration services are offered for individual subscribers only.
                        If multiple individuals propose to access the same account or for corporate accounts kindly contact or write in to us. 
                        Subscription rates will vary for multiple same time access.
                    </p>
                    <p>
                        The nature and volume of Business Standard content services you consume on the digital platforms will vary according to the type of registration you choose,
                         on the geography you reside or the offer you subscribe to.
                    </p>
                    <u>
                        <l>
                            Free Registration
                        </l>
                        <l>Special Offers</l>
                    </u>
                    </div>
                </div>
             </div>
            <div class="row">                
                <div class="col-12 col-lg-12">
                    <div style="margin-right:'120px" class="">
                        <h6>Privacy Policy and Registration</h6>
                        <p>
                            All information received by us from your registration on business-standard.com or other digital products of Business Standard will be used by Business Standard in accordance with our Privacy Policy. Kindly read the below mentioned details.
                        </p>
                        <p>
                            On registration, we expect you to provide Business Standard with an accurate and complete information of the compulsory fields. We also expect you to keep the information secure, specifically access passwords and payment information. Kindly update the information periodically to keep your account relevant.
                            Business Standard will rely on any information you provide to us. 
                        </p>
                        <p>
                            Each registration is for a single user only. On registration, you will choose a user name and password ("ID"). You are not allowed to share your ID or give access to your account to anyone else. Business Standard 
                            Premium subscription does not allow multiple users on a network or within an organization to use the same ID.
                        </p>
                        <p>
                            On knowledge, Business Standard may cancel or suspend your access to Business Standard premium services if it comes across you sharing your personal access without further obligation to you.
                        </p>
                        <p>
                            You are responsible for all the use of business-standard.com premium service made by you or anyone else using your ID
                             and for preventing unauthorised use of your ID. If you believe there has been any breach of security such as the disclosure,
                              theft or unauthorised use of your ID or any payment information, you must notify Business Standard immediately by e-mailing 
                              us at support@mpekeXchange.com.
                             We recommend that you do not select an obvious user password (such as your name) and that you change it regularly.
                        </p>
                        <p>
                            If you provide Business Standard with an email address that will result in any messages Business Standard may send you being sent to you via a network or device operated or owned by a third party (e.g. your employer or college) then you promise that you are entitled to receive those messages. To ensure email's land in your inbox, you will add the bsmail receipt id to your safe list. 
                            You also agree that Business Standard may stop sending messages to you without notifying you.
                        </p>
                    </div>
                </div>
            </div>
             <div class="row">
                
                <div class="col-12 col-lg-12">
                    <div style="margin-right:'120px" class="">
                    <h4>Contract formation</h4>
                    <p>
                        Business Standard will try to process your contract request promptly but does not guarantee that your contract request 
                        will be activated by any specified time. By submitting your payment and other subscription details, 
                        you are making an offer to us to buy a contract. Your offer will only be accepted by us and a contract downloaded and signed 
                         when we have successfully verified your payment details and email address, and other documents specified at which point we will provide you with access
                         to your subscription.
                         Business Standard reserves the right to reject any offer in its discretion, for any or no reason.
                    </p>
                    <p>
                        Business Standard may partner with third party content providers to offer bundled services, under which the payment for both the services will be collected by Business Standard. Business Standard will endeavor to provide a seamless access to all such third parties with a single one point access. There could be a gap in this seamless access due to a technology breakdown, temporary disconnection of the internet connection or any factors beyond the reasonable control of Business Standard.
                         In such cases the contract will be formed once the access to the partner services are restored.
                    </p>
                    <p>
                        You are requested to read through the terms and conditions offered by content partners to Business Standard. Most partners offer bundled services for new users. Existing subscribers of partners are not eligible for bundled subscription. Should you happen to be one please note that the partner will be liable to reject your 
                        offer to subscribe under the bundled subscription not leading to contract formation as a result. 
                    </p>
                    <h8>Payment details</h8>
                    <p>
                        When you purchase a subscription, you must provide us with complete and accurate payment information. By submitting payment details you promise that you are entitled to purchase a subscription using those payment details. If we do not receive payment authorization or any authorization is subsequently cancelled, we may immediately terminate or suspend your access to your subscription. In suspicious circumstances we may contact the issuing bank/payment provider and/or law enforcement authorities or other appropriate third parties. If you are entitled to a refund under these terms and conditions we will credit that refund to the card or other 
                        payment method you used to submit payment, unless it has expired in which case we will contact you.
                    </p>
                    <p>
                        Business Standard will use the services of quality third party payment service providers to process your payment. 
                        Payment options are primarily through credit card. Business Standard may offer other payment mechanisms from time to time
                    </p>
                    <h8>Pricing</h8>
                    <p>
                        The subscription price will be made clear to you on our sign-up pages or otherwise during the sign-up process and may vary from time to time, by region or by country. You agree to pay the fees at the rates notified to you at the time you purchase your subscription. Subscription to premium services on Business Standard are generally of monthly frequency. Business Standard however may choose to offer fixed term or fixed payment frequency offers from time to time. The currency in which your subscription is payable will be specified during the order process, depending on the service and your country of residence. Eligibility for any discounts is ascertained at the time you subscribe and cannot be changed during the term of your subscription. We will always tell you in advance of any increase in 
                        the price of your subscription and offer you an opportunity to cancel it if you do not wish to pay the new price.
                    </p>
                    </div>
                </div>
             </div> 
             <div class="row">
                
                <div class="col-12 col-lg-12">
                    <div  class="">
                    <h4>Contract formation</h4>
                     <img style="margin-left:50px;margin-top:20px" height="300px" width="950px" src="{{asset('photos/Contract.jpg.webp')}}">
                    
                     <!-- <img src="asset('/photos/Contract.jpg.webp')" alt="Girl in a jacket" width="500" height="600">  -->
                    </div>
                </div>
             </div>

        </div>
    </section>


<section  class=" content-card-style-4 pt-70 pb-100">
        <div class="container">
            <div class="row">
                
                <div class="col-12 col-lg-12">
                    <div style="margin-right:'120px" class="">
                        <h4>ABOUT US</h4>
                        <p>
                            Techeazy ltd is a ICT Company that deals in software developments and automation of business
                            procceses at affordable prices.The company offers services like Software Testing, software
                            development,web application development, API development and integrations, graphics design,
                            website development, Network infrastructure development and management, Network security
                            consultancy, research and other innovations
                        </p>
                        <p>
                            Techeazy ltd is a privately owned company Located at Plot 2183 Esseri Building Kayondo Road
                            Ntinda Karinabiri. Started in 2008, we have worked our way through the growth ladder.Our
                            different innovations such as ecrib(saas) all in one real estate solution,opinion poll
                            (saas),POS,Voting systems,Finance Management,Electronic Document Management system has
                            introduced us to the bussiness world. Our consistent presence and reliability has fetched us over
                            40 customers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                  </div>
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 paddimg-right">
                  <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form>
                           <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <input class="form-control" placeholder="Name" type="text" name="Name">
                              </div>
                              <div style="margin-top:10px" class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <input class="form-control" placeholder="Email" type="text" name="Email">
                              </div>
                              <div style="margin-top:10px" class=" form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <input class="form-control" placeholder="Phone" type="text" name="Phone">
                              </div>
                               <div style="margin-top:10px" class="form-group card-label col-xl-12 col-lg-12 col-md-12 col-sm-12">
			                            <!-- <label for="recipient-name" class="col-form-label">Description</label> -->
			                            <!-- <input type="text" class="form-control" id="action" name="action"
			                                 required > -->
			                                 <textarea placeholder="Message" type="text" name="Message" class="form-control @error('CompanyDescription') is-invalid @enderror" name="action"  rows="3" cols="5" placeholder=" weight carried(Min and max),number plate" required></textarea>
			                        </div>
                              <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <textarea class="textarea>" placeholder="Message" type="text" name="Message"></textarea>
                              </div> -->
                              <div style="margin-top:5px;margin-left:" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 justify-content-right">
                                 <button width="20px" type="submit" class="btn btn-primary btn-block">Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="map_section">
                           <figure><img  src="../images/map.jpg"></figure>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 paddimg-left">
                  <div class="Nursery-img">
                     <figure>
                        <img height="560px" src="../images/lorry.jpg" alt="img"/>
                        <div class="text-box">
                           
                        </div>
                     </figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->






    <!--====== Subscribe Part Ends ======-->
 <!--====== Footer Style 3 Part Start ======-->
    <footer style="margin-left:5px" class="row footer footer-style-4 footer-dark">
      <div class="container">
        <div class="widget-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div  style="margin-left:5px" class="footer-widget">
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
                  <li> <a href="{{url('/')}}">Home</a> </li>
                  <li> <a href="#about">About</a> </li>
                  <li><a href="#">Privacy Policy</a>
                  <li><a href="#"> Terms &amp; Conditions</a></li>
                  <li> <a href="#about">Contact</a> </li>
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
                    <a href="#0"  style="margin-left:35px">
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
                                        <p class="mb-0">Copyright &copy; MpekeXchange 2021</p>
                                        <!-- {{now()->format( 'Y')}} -->
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
              <!-- warehouse Details Modal -->
            @foreach($ware_hous as $k=>$try_m)
            <div class="modal fade" id="edit_specialities_details{{$try_m->id}}" aria-hidden="true" role="dialog">
                <div  class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h5 style="margin-left:50px"  class="modal-title">More details about {{$try_m->name}} Warehouse</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                    
                                     <div class="row">
                                         <div class="col-lg-4 col-md-7 col-sm-8 content-content">
                                            <div class="content-icon">
                                                <img style=" margin-top: 5px;margin-left: 7px" height="100px" width="100px" src="@if($try_m->logo){{asset($try_m->logo)}}@else{{asset('upload/images/lunkuse_viola_1625539581.jpg')}}@endif">
                                            </div>
                                        
                                        @foreach($pro as $pr)
                                        @if($pr->Warehouse_id==$try_m->id)
                                        <p style=" margin-top: 5px"> <strong>Grain Name: </strong>
                                            {{$pr->name}} 
                                        </p>
                                        <p> <strong>Price: </strong>{{$pr->price}} Ugx @kg</p>
                                        
                                        @endif

                                         @endforeach
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-sm-8 content-content">
                                        <div class="content-icon">
                                       <h6 style="margin-top: 5px; ">TRANSPORTER DETAILS</h6>
                                    </div>
                                        
                                        @foreach($pro as $pr)
                                        @if($pr->Warehouse_id==$try_m->id)
                                        <p style=" margin-top: 5px"> <strong> Name: </strong>
                                            transporter 
                                        </p>
                                        <p><strong> Address:</strong><br>location </p>
                                        <p> <strong>Email: </strong><br>tansporter@gmail.com</p>
                                        <p><strong>Phone Number</strong><br> 0000000000 </p>
                                        
                                        @endif

                                         @endforeach
                                    </div>
                                    <div class=" col-lg-4 col-md-7 col-sm-8 content-content">
                                        <div class="content-icon">
                                       <h6>PROCESSOR DETAILS</h6>

                                    </div>
                                        
                                        @foreach($pro as $pr)
                                        @if($pr->Warehouse_id==$try_m->id)
                                        <p style=" margin-top: 5px"> <strong> Name: </strong>
                                            processor 
                                        </p>
                                        <p><strong> Address:</strong><br>location </p>
                                        <p> <strong>Email: </strong><br>tansporter@gmail.com</p>
                                        <p><strong>Phone Number</strong><br> 0000000000 </p>
                                        
                                        @endif

                                         @endforeach
                                    </div>
                                     </div>
                                    </div>
                               
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /warehouse Details Modal -->
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

    <script src="assets2/js/main.js">
     $(document).ready(function(){
     $('#framework').multiselect({
      nonSelectedText: 'Select a project category',
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      buttonWidth:'460px'
     });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.productcategory',function(){
			console.log("hmm its change");

			var prod_id=$(this).val();

			var a=$(this).parent();
			console.log(prod_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findPrice')!!}',
				data:{'id':prod_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("price");
					console.log(data);
                    console.log(data.length);

                    op+='<option value="0" selected disabled>select by Name</option>';

					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].name+'">'+data[i].name+'</option>';
				   }

				   a.find('.productname').html(" ");
				   a.find('.productname').append(op);
                  

				},
                error: function(e) {
                console.log(e.responseText);
                }
			});
		});

		$(document).on('change','.districts',function () {
			var prod_id=$(this).val();

			var a=$(this).parent();
			console.log(prod_id);
      var div=$(this).parent();
      $('#city').html('');
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('findPrice')!!}',
				data:{'id':prod_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("price");
					console.log(data);
          console.log(data.district);

          	op+='<option value="0" selected disabled>chose product</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data.id+'">'+data.id+'</option>';
				   }

				   div.find('.productname').html(" ");
				   div.find('.productname').append(op);

				// op+='<option value="0" selected disabled>chose warehouse</option>';
				// 	for(var i=0;i<data.length;i++){
				// 	op+='<option value="'+data[i].id+'">'+data[i].id+'</option>';
				//    }

				//    div.find('.warehouse').html(" ");
				//    div.find('.warehouse').append(op);
				},error: function(e) {
            console.log(e.responseText);
          }
			});


		});

	});
</script>

</body>
</html>