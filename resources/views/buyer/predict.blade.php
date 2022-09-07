@extends('buyer.app')

@section('content')
<div class="container text-center">
    <div class="col-md-11 text-center">       
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Price prediction</h1></div>
            </div>
        </div>
    </div>

    <!-- here is where we are starting from -->

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
<div id="chartContainer" style="height: 400px; width: 90%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                       


</div>
@endsection
