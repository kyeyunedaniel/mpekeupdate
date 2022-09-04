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
 


 <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
</head>
<body class="app sidebar-mini rtl ">
    @include('admin.partials.header')
    @include('admin.partials.side')
    <main class="app-content py-4" id="app">
        <!-- @yield('content') -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
                        <div class="card card-default">
                            <div class="card-body text-center">
                                <div class="card-header">
                                    Please enter the amount for which you want to make payment
                                </div>
                                <label class="form-control">Enter Amount for Paytm Payment Demo</label>'
                                <form method="post" action="{{route('paytm.payment')}}">
                                    @csrf
                                    <input type="text" name="amount" placeholder="RS 10" class="form-control"/>
                                    <button type="submit" class="btn btn-primary mt2">Pay</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </main>
    

    
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
</html>
