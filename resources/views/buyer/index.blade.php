@extends('buyer.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-12">
                <div class="">
                   <div class="row">
          
            <div class="col-sm-5">
                <div class="card">
                <div class="card-body" style="text-align: center;">
                    <h1 class="card-title">Go Shopping</h1>
                    <a href="{{route('buyer.shop')}} " class="btn btn-primary">View</a>
                </div>
                </div>
            </div>
              <div class="col-sm-5">
                <div class="card">
                <div class="card-body" style="text-align: center;">
                    <h1 class="card-title"> Profile </h1>
                    
                    
                    <a href="{{route('profile_buyer')}}" class="btn btn-primary">View</a>
                </div>
                </div>
            </div>
            </div>
                </div>
            </div>
    </div>
    <br><br><br><br>
    <?php
    $warehouses=DB::table('warehouses')->count();
    $farmer=DB::table('users')->where('user_type','farmer')->count();
    $dataPoints = array( 
	
	
	array("y" => $warehouses, "label" => "warehouses" ),
	array("y" => $farmer, "label" => "farmers" ),
	
	
);

 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "SYSTEMS USERS GRAPH"
	},
	axisY: {
		title: "Number of Users"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## people",
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
<br><br><br>
          
@endsection
