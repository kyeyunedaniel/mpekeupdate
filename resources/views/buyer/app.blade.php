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

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
   <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" type="text/css"> 
  


 <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
</head>
<body class="app sidebar-mini rtl ">
     <!-- @include('buyer.partials.navbar') -->
    @include('buyer.partials.header')
    @include('buyer.partials.side')
    <main class="app-content" id="app">
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>

    <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

  
    @stack('scripts')
</body>
<div id="layoutAuthentication_footer">
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; MpekeXchange {{now()->format( 'Y')}}</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
                <div ><a target="_blank" href="https://billbrain.tech/">powered by MpekeXchange</a></div>
            </div>
        </div>
    </footer>
</div>
</html>
