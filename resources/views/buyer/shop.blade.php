@extends('buyer.app')
@section('title') SHOPPING CART @endsection
@section('content')
    <div class="container" style="margin-top: 3px">
     
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>List of all grains available in warehouses</h4>
                        <div class="row">
            @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
           {{Session::get('success')}}
           @endif
        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($products as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="@if($pro->logo){{asset($pro->logo)}}@else{{asset('photos/agric.jpg')}}@endif"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="@if($pro->logo){{asset($pro->logo)}}@else{{asset('photos/agric.jpg')}}@endif"
                                >
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                    <p>UGx.{{ $pro->price }}</p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->logo }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->name }}" id="slug" name="name">
                                        <input type="text" value="{{ $pro->quantity }}" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
