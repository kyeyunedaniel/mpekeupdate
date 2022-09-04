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
</div>
@endsection
