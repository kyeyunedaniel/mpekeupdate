<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    
   <meta charset="utf-8"  />
   <!-- http-equiv="refresh" content="40" -->
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
    <main class="app-content" id="app">
        <div class="container text-center">
    <div class="col-md-11 text-center">
        <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="">
                    <h5>WAREHOUSE</h5>
                    <p style="color:blueviolet;"> <b>{{$warehouses}}</b> </p>
                   
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-thumbs-o-up fa-3x"></i>
                <div class="info">
                <h4>FARMERS</h4>
                    <p style="color:blueviolet;"><b>{{$farmer}} </b></p>
                
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>BUYERS</h4>
                    <p style="color:blueviolet;"><b>{{$buyer}} </b></p>
                 </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>ADMINS</h4>
                    <p style="color:blueviolet;"><b>{{$admin}} </b></p>
                   
                </div>
            </div>
        </div>
    </div>
    <div style="margin-left:;" class="container ">
    <div  class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h1 class="card-title">Warehouse manager</h1>
                <p class="card-text">Add and Edit Warehouse manager information.</p>
                <a href="{{route('admin.ware_house.index')}}" class="btn btn-primary">WAREHOUSE MANAGER</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h1 class="card-title"> Warehouse</h1>
                <p class="card-text">Add and Edit/Modify Warehouse information.</p>
                <a href="{{route('admin.ware_house.house.index')}}" class="btn btn-primary">WAREHOUSE</a>
            </div>
            </div>
        </div>
        </div><br>
        
        <div class="row">

        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h1 class="card-title">Manage Farmer</h1>
                <p class="card-text">Add and Edit/Modify Farmer information.</p>
                <a href="{{route('admin.farmer.index')}}" class="btn btn-primary">FARMER</a>
            </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h1 class="card-title">Manage Buyers</h1>
                <p class="card-text">Add and Edit/Modify Buyer information.</p>
                <a href="{{route('admin.buyer.index')}}" class="btn btn-primary">BUYER</a>
            </div>
            </div>
        </div>
      
    </div>
    <br><br><br>
    <?php
 
$dataPoints = array( 
	array("y" => 33, "label" => "admin" ),
	array("y" => 24, "label" => "buyers" ),
	array("y" => 18, "label" => "managers" ),
	array("y" => 14, "label" => "farmers" ),
	array("y" => 60, "label" => "warehouses" ),
	
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
