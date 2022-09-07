<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('backend/cssstock/materialize.min.css') }}" /> 
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/cssstock/style.css') }}" /> 
 


 <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css"> 
  <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" /> 
  <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/w3.css') }}" />
    @yield('styles')
    <style>
  .close-first{
    display: none;
  }
  </style>
</head>
<body class="app sidebar-mini rtl ">
 @include('ware_house.partials.header')
    @include('ware_house.partials.side')
    <main class="app-content" id="app">
     <div class="row" style="padding-left:10px;padding-right:10px">
  <ul style="display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;" class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons" style="font-size:3rem">Settings</i>
        <div class="row" style="margin-bottom:10px;margin-top:10px;margin-left:600px;">
          <div class="col s3 m1">
            
          </div>
          <div class="input-field col s12 m1 right" style="margin-top:5px; width:160px">
            <button id="trainbutton" class="waves-effect waves-light btn red lighten-2">Train</button>
          </div>
          <div class="input-field col s12 m1 right" style="margin-top:5px; width:160px">
            <button id="suggestbutton" class="waves-effect waves-light btn blue lighten-2">Suggest</button>
          </div>
         <!--  <div class="file-field input-field col s12 m1 right" style="margin-top:5px; width:160px">
            <div class="btn blue lighten-2" style="height:36px; line-height:2.5rem">
              <span>Pick CSV</span>
              <input id="uploadcsv" type="file">
            </div>
          </div> -->
        </div>
      </div>
      <div class="collapsible-body"><span>
        <div class="row center">
          <div class="input-field col m2 offset-m1" style="margin-left:5.33%">
            Neural Network settings
          </div>
          <div class="input-field col s12 m1">
            <input id="learningrate" type="number" placeholder="Eg: 0.001" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="learning rate during training">
            <label class="active"readonly>Learning rate</label>
          </div>
          <div class="input-field col s12 m1">
            <input id="inputdropoutrate" type="number" placeholder="Eg: 0.9" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="dropout rate for LSTM input">
            <label class="active"readonly>Input dropout rate</label>
          </div>
          <div class="input-field col s12 m1">
            <input id="outputdropoutrate" type="number" placeholder="Eg: 0.9" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="dropout rate for LSTM output">
            <label class="active"readonly>Output dropout rate</label>
          </div>
          <div class="input-field col s12 m1">
            <input id="timestamp" type="number" class="validate tooltipped" placeholder="Eg: 5" data-position="bottom" data-delay="50" data-tooltip="Trends for every minibatch">
            <label class="active"readonly>Timestamp per training</label>
          </div>
          <div class="input-field col s12 m1">
            <input id="sizelayer" type="number" class="validate tooltipped" placeholder="Eg: 64" data-position="bottom" data-delay="50" data-tooltip="LSTM size">
            <label class="active">Size layer</label>
          </div>
          <div class="input-field col s12 m1">
            <input id="epoch" type="number" class="validate tooltipped" placeholder="Eg: 10" data-position="bottom" data-delay="50" data-tooltip="Total epoch">
            <label class="active"readonly>Training Iteration</label>
          </div>
          <div class="input-field col s12 m1">
            <input id="future" type="number" class="validate tooltipped" placeholder="Eg: 10" data-position="bottom" data-delay="50" data-tooltip="number of days forecast">
            <label class="active"readonly>Future days to forecast</label>
          </div>
          <div class="input-field col s12 m1">
            <input id="smooth" type="number" class="validate tooltipped" placeholder="Eg: 10" data-position="bottom" data-delay="50" data-tooltip="Rate anchor smoothing for trends">
            <label class="active"readonly>Smoothing weights</label>
          </div>
        </div>
        <div class="row center">
          <div class="input-field col m2 offset-m1" style="margin-left:5.33%">
            Buying & Selling simulation
          </div>
          <div class="input-field col s12 m2">
            <input id="initialmoney" type="number" placeholder="Eg: 10000" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Money in for simulation">
            <label class="active" readonly>Initial money(usd)</label>
          </div>
          <div class="input-field col s12 m2">
            <input id="maxbuy" type="number" placeholder="Eg: 5" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Max unit to buy">
            <label class="active" readonly>Max buy(unit)</label>
          </div>
          <div class="input-field col s12 m2">
            <input id="maxsell" type="number" class="validate tooltipped" placeholder="Eg: 10" data-position="bottom" data-delay="50" data-tooltip="Max unit to sell">
            <label class="active" readonly>Max sell(unit)</label>
          </div>
          <div class="input-field col s12 m2">
            <input id="history" type="number" class="validate tooltipped" placeholder="Eg: 5" data-position="bottom" data-delay="50" data-tooltip="MA to compare of">
            <label class="active" readonly>Historical rolling</label>
          </div>
        </div>
      </span></div>
    </li>
  </ul>
</div>


<h6 class='header center light'> upload any stock CSV file to be used</h6>
<div class="row" style="padding-left:10px;padding-right:10px">
  <div class="col s12 m12">
    <div id="div_output" style="height: 500px;"></div>
  </div>
</div>
<br>
<div class="row close-first" style="padding-left:10px;padding-right:10px">
  <div class="col s12 m8">
    <div id="div_dist" style="height: 450px;"></div>
  </div>
  <div class="col s12 m4">
    <div class="row">
      <div id="div_loss" style="height: 250px;"></div>
    </div>
    <div class="row" id="log" style="height: 150px; overflow:auto;">
    </div>
  </div>
</div>
<div class="row" style="padding-left:10px;padding-right:10px">
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">archive</i>Simulation log</div>
      <div class="collapsible-body"><span>
        <table class="bordered highlight">
          <thead>
            <tr>
              <th>Date</th>
              <th>Action</th>
              <th>Price</th>
              <th>Investment</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody id='table-body'>
          </tbody>
        </table><br>
        <span id="log-invest"></span>
      </span></div>
    </li>
  </ul>
</div>
<div class="row center" id="color-investment">
</div>
    </main>



    
   <script type="text/javascript" src="{{asset('stock/js/tf.js')}}"></script>
<script type="text/javascript" src="{{asset('stock/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('stock/js/materialize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('stock/js/d3.v3.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('stock/js/numeric-1.2.6.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('stock/js/numjs.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('stock/js/utils.js')}}"></script>
<script  type="text/javascript" src="{{asset('stock/js/echarts.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('stock/js/echarts-gl.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('stock/js/papaparse.min.js')}}"></script>
<script  type="text/javascript" src="{{asset('stock/data/google.js')}}"> </script>
<script  type="text/javascript" src="{{asset('stock/init.js')}}"> </script>

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
