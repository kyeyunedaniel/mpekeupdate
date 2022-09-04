<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>{{ config('app.name', 'MpekeXchange') }}</title>

    

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
    <link rel="stylesheet" href="{{asset('assets2/css/slick.css')}}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{('assets2/css/LineIcons.css')}}">

    <!--====== Material Design Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('assets2/css/materialdesignicons.min.css')}}">

    <!--====== Jquery Ui CSS ======-->
    <link rel="stylesheet" href="{{asset('assets2/css/jquery-ui.min.css')}}">

    <!--====== nice select CSS ======-->
    <link rel="stylesheet" href="{{asset('assets2/css/nice-select.css')}}">
    <script>
        $(document).ready(function() {
$('.mdb-select').materialSelect();
});
    </script>

    <!--====== Bootstrap CSS ======-->
    <!-- <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css')}}"> -->

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('assets2/css/default.css')}}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap-5.0.0-alpha-2.min.css')}}" /> -->
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="{{asset('assets/css/lindy-uikit.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/base-style.css')}}"/>
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
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </div>
                    </div>
                </form>
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
                            <form method="get" action="{{route('search')}} " class="submit">
                                <!-- @csrf -->
                                
                            <div class="navbar-search-cart d-none d-lg-flex">
                                <!-- navbar search start -->
                            
                                <div class="navbar-search search-style-5">
                                     <div style="margin-right:-15px" class="row ">
                                          <select style="width:155px;" class=" form-control select2 productcategory" id="prod_cat_id">		
                                                  <option value="0" disabled="true" selected="true">search by district</option>
                                                  @foreach($districts as $cat)
                                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                  @endforeach

                                         </select>

                                          <select name="search" id="productname" style="max-width:165px;margin-left:1px" class="form-control select2 productname" >		
                                                  <option value="0" disabled="true" selected="true">search by name</option>
                                                  

                                         </select>
                                        
                                          
                                     </div>
                                    <div style="margin-top: ; " class="search-btn">
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
                @forelse($posts as $pdt)
                <div class="col-lg-4 col-md-7 col-sm-8">
                    <div class="single-content mt-15 text-center">
                        <div class="content-icon">
                            <img style=" margin-top: 5px;margin-left: 7px" height="100px" width="100px" src="@if($pdt->logo){{asset($pdt->logo)}}@else{{asset('upload/images/lunkuse_viola_1625539581.jpg')}}@endif">
                        </div>
                        <div class="content-content">
                            <h4 class="title"><a href="javascript:void(0)">{{$pdt->name}} </a></h4>
                            @forelse($pro as $pr)
                            @if($pr->Warehouse_id==$pdt->id)
                            <p style=" margin-top: 5px"> <strong>Name: </strong>
                                {{$pr->name}} 
                            </p>
                            <p> <strong>Price: </strong>{{$pr->price}} Ugx @kg</p>
                            
                            @endif
                            @empty
                            <p>No product attached</p>

                             @endforelse
                        </div>
                    </div>

                </div>
                 @empty
                 <div class="col-lg-6 col-md-7 col-sm-12">
                    <div class="single-content mt-15 text-center">
                    <p  >No results searched for warehouse <strong>{{request()->query('search')}}</strong> </p>
                     </div>
                    </div>
                @endforelse
                             
            </div>
             
             
        </div>
    </section>


    <!-- contracts ahead -->
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
                                    
                                    {{$contract->warehouse_id}}
                                
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
                                    <img height="150px" width="150px" class="img-fluid" alt="User Image" src="{{asset('assets/img/MTN.png')}}">
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
                        <h4>ABOUT US</h4>
                        <p>
                            Tecgeazy ltd is a ICT Company that deals in software developments and automation of business
                            procceses at affordable prices.The company offers services like Software Testing, software
                            development,web application development, API development and integrations, graphics design,
                            website development, Network infrastructure development and management, Network security
                            consultancy, research and other innovations
                        </p>
                        <p>
                            Tecgeazy ltd is a privately owned company Located at Plot 2183 Esseri Building Kayondo Road
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


        <div class="row">
                        <div class="col-md-12 d-lg-flex justify-content-center mt-s mb-0">
                       {{ $posts->appends(request()->input())->links()}}
                            
                        </div>
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
