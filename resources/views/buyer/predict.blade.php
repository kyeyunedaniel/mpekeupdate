@extends('buyer.app')

@section('content')
<div class="container text-center">
    <div class="col-md-11 text-center">       
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Price prediction</h1></div>
                
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
echo "THE NEXT PREDICTED PRICE IS ";
echo($anForecast[0]); echo('<br>');

}
?>
            </div>
        </div>
    </div>
</div> 
<br>
    <br>
    <br>
    <br>         
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
<head>
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
<div id="chartContainer" style="height: 400px; width: 90pxpx;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                       



@endsection
