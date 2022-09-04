@extends('buyer.app')
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
                
                <form action="https://checkout.flutterwave.com/v3/hosted/pay" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        
                        
                        <div class="form-group">
                            <label class="control-label" for="fname">Full Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter full Name" class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ old('fname',Auth::user()->name) }}" disabled="" />
                            @error('fname') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="email" id="email" placeholder="Enter Email" value="{{ old('email',Auth::user()->email) }}" />
                            @error('email') {{ $message }} @enderror
                        </div>
                      
                          <div class="form-group">
                            <label class="control-label" for="tagline">Contact Line <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter contact line" class="form-control @error('tagline') is-invalid @enderror" type="text" name="tagline" id="tagline" value="{{ old('tagline') }}"/>
                            @error('tagline') {{ $message }} @enderror
                        </div>
                        @foreach($order as $ord)
                        <div class="form-group">
                            <label class="control-label" for="order_number">Order Number <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter contact line" class="form-control @error('order_number') is-invalid @enderror" type="text" name="order_number" id="order_number" value="{{ old('order_number',$ord->order_number) }}" disabled />
                            @error('order_number') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="Amount">Amount Payable <span class="m-l-5 text-danger"> *</span></label>                            
                            <input placeholder="Enter Amount payable" class="form-control @error('Amount') is-invalid @enderror" type="text" name="Amount" id="Amount" value="UGx.{{ old('Amount',$ord->grand_total) }}" disabled />
                            @error('Amount') {{ $message }} @enderror
                            @endforeach
                        </div>
                        
                    <div class="tile-footer">
                        <button style="margin-left: 310px" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Make Payment</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
