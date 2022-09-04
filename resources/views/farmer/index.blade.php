    @extends('farmer.app')

    @section('content')
    <div class="container">
            <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="widget-small primary coloured-icon">
                    <i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h5>WAREHOUSE</h5>
                        <h3>4</h3>
                       
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-5">
                <div class="widget-small danger coloured-icon">
                    <i class="icon fa fa-star fa-3x"></i>
                    <div class="info">
                        <h4>DATE</h4>
                        <p>{{now()}}</p>
                       
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                   <div class="row">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body" style="text-align: center;">
                    <h1 class="card-title"> Warehouse </h1>
                    
                    <a href="{{route('farmer.house')}}" class="btn btn-primary">View</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body" style="text-align: center;">
                    <h1 class="card-title">Grain Inventory</h1>
                    <p class="card-text">Add and Edit/Modify Inventory information.</p>
                    <a href="{{route('farmer.inventory')}}" class="btn btn-primary">View</a>
                </div>
                </div>
            </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
