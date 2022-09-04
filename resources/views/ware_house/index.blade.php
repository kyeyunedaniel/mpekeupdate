@extends('ware_house.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                   <div class="row">
            <div class="col-sm-5">
                <div class="card">
                <div class="card-body" style="text-align: center;">
                    <h1 class="card-title">Manage Warehouse </h1>
                    <p class="card-text">Add and Edit/Modify Warehouse information.</p>
                    
                    <a href="{{route('ware_house.ware_house.house.index')}}" class="btn btn-primary">View</a>
                </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                <div class="card-body" style="text-align: center;">
                    <h1 class="card-title">Prediction</h1>
                    <a href="{{url('warehouse/predict_prices')}} " class="btn btn-primary">View</a>
                </div>
                </div>
            </div>
            </div>
                </div>
            </div>
        </div>
</div>
@endsection
