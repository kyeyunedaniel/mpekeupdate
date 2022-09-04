@extends('admin.app')
@section('title') Buy Grains @endsection
@section('content')
    <div class="app-title">
         <div>
            <h1><i class="fa fa-money"></i> Make payment for your grain selection</h1>
        </div>
        <div class="row">
            @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
           {{Session::get('success')}}
           @endif
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="tile">

                 <form class="form-horizontal" method="POST" action="{{route('stkSimulation')}} ">
                    @csrf
                    <!-- https://checkout.flutterwave.com/v3/hosted/pay -->
                   
                   <div class="form-group">
                                            <label for="title"> Email</label>
                  <input type="email" value="{{Auth::user()->email}}" name="email"  class="form-control"  readonly /></div>
                    <div class="form-group">
                                            <label for="title"> Phone Number</label>
                  <input type="tel" value="{{Auth::user()->contact}}" name="phone_number"  class="form-control" required/></div>
                  
                   <div class="form-group">
                                            <label for="title"> Name</label>
                  <input type="text" value="{{Auth::user()->name}} " name="name"  class="form-control"readonly/></div>
                    <div class="form-group">
                                            <label for="title">Amount</label>
                  <input type="text"  name="amount"  class="form-control" value=" {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}" required/></div>
                   <div class="form-group">
                                            <label for="title">Currency</label>
                  <input type="text" name="currency" value="UGX" class="form-control" readonly/></div>
                 
                  
                  <button type="submit" class="btn btn-primary">Make Payment</button> 
                </form>
               
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
