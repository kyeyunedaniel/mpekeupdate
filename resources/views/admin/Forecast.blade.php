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
    @include('admin.partials.header')
    @include('admin.partials.side')
    <main class="app-content" id="app">
     <div class="row" style="padding-left:10px;padding-right:10px">
  <ul style="display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;" class="collapsible" data-collapsible="accordion">
<div>
<div> <H2 align="center" color="DodgerBlue" >   PREDICTION  </H2>


<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

$anData = array(1144,
1200,1177,1601,1171,1207,1251,1087,1016,1149,1667,1583,1022,1199,1526,1564,1309,1485,1287,1167,1339,1253,1060,1199,1432,1669,1782,1638,1769,1774,1800,1880,1860,1810);




print_r(forecastHoltWinters($anData));

function forecastHoltWinters($anData, $nForecast =1, $nSeasonLength =6, $nAlpha =0.2, $nBeta = 0.05, $nGamma = 0.01, $nDevGamma = 0.1) {

// Calculate an initial trend level
$nTrend1 = 0;
for($i = 0; $i < $nSeasonLength; $i++) {
  $nTrend1 += $anData[$i];
}
$nTrend1 /= $nSeasonLength;

$nTrend2 = 0;
for($i = $nSeasonLength; $i < 2*$nSeasonLength; $i++) {
  $nTrend2 += $anData[$i];
}
$nTrend2 /= $nSeasonLength;

$nInitialTrend = ($nTrend2 - $nTrend1) / $nSeasonLength;

// Take the first value as the initial level
$nInitialLevel = $anData[0];

// Build index
$anIndex = array();
foreach($anData as $nKey => $nVal) {
  $anIndex[$nKey] = $nVal / ($nInitialLevel + ($nKey + 1) * $nInitialTrend);
}

// Build season buffer
$anSeason = array_fill(0, count($anData), 0);
for($i = 0; $i < $nSeasonLength; $i++) {
  $anSeason[$i] = ($anIndex[$i] + $anIndex[$i+$nSeasonLength]) / 2;
}

// Normalise season
$nSeasonFactor = $nSeasonLength / array_sum($anSeason);
foreach($anSeason as $nKey => $nVal) {
  $anSeason[$nKey] *= $nSeasonFactor;
}

$anHoltWinters = array();
$anDeviations = array();
$nAlphaLevel = $nInitialLevel;
$nBetaTrend = $nInitialTrend;
foreach($anData as $nKey => $nVal) {
  $nTempLevel = $nAlphaLevel;
  $nTempTrend = $nBetaTrend;

  $nAlphaLevel = $nAlpha * $nVal / $anSeason[$nKey] + (1.0 - $nAlpha) * ($nTempLevel + $nTempTrend);
  $nBetaTrend = $nBeta * ($nAlphaLevel - $nTempLevel) + ( 1.0 - $nBeta ) * $nTempTrend;

  $anSeason[$nKey + $nSeasonLength] = $nGamma * $nVal / $nAlphaLevel + (1.0 - $nGamma) * $anSeason[$nKey];

  $anHoltWinters[$nKey] = ($nAlphaLevel + $nBetaTrend * ($nKey + 1)) * $anSeason[$nKey];
  $anDeviations[$nKey] = $nDevGamma * abs($nVal - $anHoltWinters[$nKey]) + (1-$nDevGamma) 
              * (isset($anDeviations[$nKey - $nSeasonLength]) ? $anDeviations[$nKey - $nSeasonLength] : 0);
}

$anForecast = array();
$nLast = end($anData);
for($i = 1; $i <= $nForecast; $i++) {
   $nComputed = round($nAlphaLevel + $nBetaTrend * $anSeason[$nKey + $i]);
   if ($nComputed < 0) { // wildly off due to outliers
     $nComputed = $nLast;
   }
   $anForecast[] = $nComputed;
}
echo("THE NEXT PREDICTED VALUE IS:");
echo($anForecast[0]); echo('<br>');




}
?>
<br>
<br>
<br>
<br>
</div>

<?php  

$dataPoints = array( 

    array("x" => 1514485800000, "y" => array(1840,1850,1860,1910)),
    array("x" => 1514399400000, "y" => array(1669,1782,1638,1769)),
    array("x" => 1514313000000, "y" => array(1253,1060,1199,1432)),
    array("x" => 1513881000000, "y" => array(1526,1564,1309,1485)),
    array("x" => 1513794600000, "y" => array(1667,1583,1022,1199)),
    array("x" => 1513708200000, "y" => array(1309,1485,1287,1167)),
    array("x" => 1513621800000, "y" => array(1149,1667,1583,1022)),
    array("x" => 1513535400000, "y" => array(1564,1309,1485,1287)),
    array("x" => 1513276200000, "y" => array(1309,1485,1289,1167)),
    array("x" => 1513189800000, "y" => array(1087,1149,1339,1309)),
    array("x" => 1513103400000, "y" => array(1309,1485,1287,1167)),
    array("x" => 1513017000000, "y" => array(1309,1485,1287,1167)),
    array("x" => 1512930600000, "y" => array(1209,1285,1287,1167)),
    array("x" => 1512671400000, "y" => array(1209,1285,1287,1167)),
    array("x" => 1512585000000, "y" => array(1149,1267,1283,1180)),
    array("x" => 1512498600000, "y" => array(1209,1285,1287,1168)),
    array("x" => 1512412200000, "y" => array(1109,1295,1270,1169)),
    array("x" => 1512325800000, "y" => array(1309,1485,1287,1167)),
    array("x" => 1512066600000, "y" => array(1000,1150,1130,1170))
)
   


?>
<!DOCTYPE HTML>
<html>
<head align="center">
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "GRAIN PRICES PREVAILING"
    },
    subtitles: [{
        text: "UGX"
    }],
    axisX: {
        valueFormatString: "D"
    },
    axisY: {
        suffix: " UGX"
    },
    data: [{
        type: "candlestick",
        xValueType: "dateTime",
        yValueFormatString: "#,##0.0 UGX",
        xValueFormatString: "",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 400px; width: 95%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                       





</div>




    <li>
      <div class="collapsible-header"><i class="material-icons" style="font-size:3rem"></i>
      </div>
        <div class="row" style="margin-bottom:10px;margin-top:10px;margin-left:600px;">
          <div class="col s3 m1">
            
          </div>
          <div class="input-field col s12 m1 right" style="margin-top:5px; width:160px">
            <button id="trainbutton" class="waves-effect waves-light btn red lighten-2">Train</button>
          </div>
          <div class="input-field col s12 m1 right" style="margin-top:5px; width:160px">
            <button id="suggestbutton" class="waves-effect waves-light btn blue lighten-2">Suggest</button>
          </div>
          <div class="file-field input-field col s12 m1 right" style="margin-top:5px; width:160px">
            <div class="btn blue lighten-2" style="height:36px; line-height:2.5rem">
              <input id="uploadcsv" type="file">
              <span>Upload CSV</span>
              
            </div>
          </div>
        </div>
      </div>


      <div class="collapsible-body"><span>
        <div class="row center">
          <div class="input-field col m2 offset-m1" style="margin-left:5.33%">
           
<br>
  
          </div>
          <form action="">
          Neural Network settings

          <br><br>
            <input id="learningrate" type="number" placeholder="0.001" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="learning rate during training">
            <label class="active" readonly>Learning rate</label>
            <br><br>

            <input id="inputdropoutrate" type="number" placeholder="Eg: 0.9" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="dropout rate for LSTM input">
            <label class="active">Input dropout rate</label>
             
           <br><br>
            <input id="outputdropoutrate" type="number" placeholder="Eg: 0.9" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="dropout rate for LSTM output">
            <label class="active">Output dropout rate</label>
             
           <br><br>
            <input id="timestamp" type="number" class="validate tooltipped" placeholder="Eg: 5" data-position="bottom" data-delay="50" data-tooltip="Trends for every minibatch">
            <label class="active">Timestamp per training</label>
             
           <br><br>
            <input id="sizelayer" type="number" class="validate tooltipped" placeholder="Eg: 64" data-position="bottom" data-delay="50" data-tooltip="LSTM size">
            <label class="active">Size layer</label>
             <br><br>
           
            <input id="epoch" type="number" class="validate tooltipped" placeholder="Eg: 10" data-position="bottom" data-delay="50" data-tooltip="Total epoch">
            <label class="active">Training Iteration</label>
             
           <br><br>
            <input id="future" type="number" class="validate tooltipped" placeholder="Eg: 10" data-position="bottom" data-delay="50" data-tooltip="number of days forecast">
            <label class="active">Future days to forecast</label>
             <br><br>
           
            <input id="smooth" type="number" class="validate tooltipped" placeholder="Eg: 10" data-position="bottom" data-delay="50" data-tooltip="Rate anchor smoothing for trends">
            <label class="active">Smoothing weights</label>
             <br><br>
      
        
          
            Buying & Selling simulation
             
          
            <input id="initialmoney" type="number" placeholder="Eg: 10000" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Money in for simulation">
            <label class="active">Initial money($)</label>
             
         
            <input id="maxbuy" type="number" placeholder="Eg: 5" class="validate tooltipped" data-position="bottom" data-delay="50" data-tooltip="Max unit to buy">
            <label class="active">Max buy(unit)</label>
             
         
            <input id="maxsell" type="number" class="validate tooltipped" placeholder="Eg: 10" data-position="bottom" data-delay="50" data-tooltip="Max unit to sell">
            <label class="active">Max sell(unit)</label>
             
          
            <input id="history" type="number" class="validate tooltipped" placeholder="Eg: 5" data-position="bottom" data-delay="50" data-tooltip="MA to compare of">
            <label class="active">Historical rolling</label>
             
        </div>
      </span></div>
    </li>
  </ul>
</div>


<!-- <h6 class='header center light'> upload stock CSV file to be used</h6> -->
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
