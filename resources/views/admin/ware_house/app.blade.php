<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />


 <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
   <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" type="text/css"> 
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
</head>
<body class="app sidebar-mini rtl ">
    @include('ware_house.partials.header')
    @include('ware_house.partials.side')
    <main class="app-content" id="app">
        @yield('content')
    </main>

   <!--  <script type="text/javascript">
   $(document).ready(function(){
    //selector for the business metric congurator
    $(".metric-config").change(function(){
        //getting the values to pass into the ajax call
        var configName = $(this).data('config');
        var id = $(this).data('id');
        var status = $(this).data('status');

      $.ajax({
          //the beginning of the ajax process
          url: 'ajax_bot/metrics_updater.php',
          method : 'post',
          data : {configName : configName, id : id, status : status },
          success: function(response){
              //show a notification or something
              //alert(response);
              $("#notifyT").html(response + "!").show().fadeOut(2000);
          }
      });

    });    </script> -->
    

    
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>

    <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

  <script type="text/javascript" src="{{asset('assets/js/bootstrap-multiselect.js')}}"></script>
   <link href="{{asset('css/bootstrap-multiselect.css')}}" rel="stylesheet" type="text/css">
    @stack('scripts')
</body>
</html>
