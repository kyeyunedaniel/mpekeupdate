   <h3>Buy Movie Tickets N500.00</h3>
<form method="POST" action="{{ route('pay') }}" id="paymentForm">
    {{ csrf_field() }}

    <input name="name" placeholder="Name" />
    <input name="email" type="email" placeholder="Your Email" />
    <input name="phone" type="tel" placeholder="Phone number" />

    <input type="submit" value="Buy" />
</form>



   
                <form action="https://checkout.flutterwave.com/v3/hosted/pay" method="post" role="form" enctype="multipart/form-data">
                    <
                    @csrf
                    <div class="tile-body">
                         <input type="hidden" name="public_key" value="FLWPUBK-42a96f853e0d3634eee52ea2064421b1-X" />
                         <input type="hidden" name="meta[token]" value="54" />
  <input type="hidden" name="redirect_url" value="https://demoredirect.localhost.me/" />
                        
                        
                        <div class="form-group">
                            <label class="control-label" for="fname">Full Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter full Name" class="form-control @error('fname') is-invalid @enderror"  name="customer[name]" id="fname" value="{{ old('fname',Auth::user()->name) }}" disabled="" />
                            @error('fname') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                           <input  name="customer[email]"  class="form-control" />
                            @error('email') {{ $message }} @enderror
                        </div>
                      
                          <div class="form-group">
                            <label class="control-label" for="tagline">Contact Line <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter contact line" class="form-control @error('tagline') is-invalid @enderror" name="customer[phone_number]" id="tagline" value="{{ old('tagline') }}"/>
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
                            <input placeholder="Enter Amount payable" class="form-control @error('Amount') is-invalid @enderror" name="amount" id="Amount" value="UGx.{{ old('Amount',$ord->grand_total) }}" disabled />
                            @error('Amount') {{ $message }} @enderror
                           
                        </div>
                         @endforeach