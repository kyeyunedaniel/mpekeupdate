@extends('buyer.app')
@section('title', 'Checkout')
@section('content')
    <section class="section-pagetop ">
        <div class="container clearfix">
            <h2 class="title-page">Checkout</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="https://checkout.flutterwave.com/v3/hosted/pay" method="POST" role="form">
                <input type="hidden" name="public_key" value="FLWPUBK_TEST-020702750bd7f0266782da13ab90024d-X" />
                <input type="hidden" name="customer[email]" value="kyeyunedaniel22@gmail.com" /> <br>
                <input type="hidden" name="customer[name]" value="{{old('first_name',Auth::user()->name)}} " />
                <input type="hidden" name="tx_ref" value="bitethtx-0eew19203" />
                <input type="hidden" name="currency" value="UGX" />
                <input type="hidden" name="meta[token]" value="54" />
                <input type="hidden" name="redirect_url" value="http://127.0.0.1:8000/buyer" />
                <input type="hidden" name="amount" value="{{ \Cart::getSubTotal() }}" />

                
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Billing Details</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Full name</label>
                                        <input type="text" class="form-control" name="first_name" value="{{old('first_name',Auth::user()->name)}} " >
                                    </div>
                                    <!-- <div class="col form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="last_name">
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" value="{{old('first_name',Auth::user()->address)}} "  class="form-control" name="address">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" value="{{old('first_name',Auth::user()->city)}} "  class="form-control" name="city">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <input type="text" value="{{old('first_name',Auth::user()->country)}} "  class="form-control" name="country">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>Post Code</label>
                                        <input type="text"  class="form-control" name="post_code">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" value="{{old('first_name',Auth::user()->contact)}} "  class="form-control" name="phone_number" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email',auth::user()->email) }}" disabled>
                                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label>Order Notes</label>
                                    <textarea class="form-control" name="notes" rows="6"></textarea>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Your Order</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Total cost: </dt>
                                            <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }} </dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                    var x = getElementByName("phone_number").value;


            </script> 
                
          
        </div>
    </section>
@stop