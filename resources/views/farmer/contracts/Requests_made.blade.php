@extends('farmer.app')
@section('title') Contract @endsection
@section('content')
        <style>
            .jay-signature-pad {
                position: relative;
                display: -ms-flexbox;
                -ms-flex-direction: column;
                width: 100%;
                height: 100%;
                max-width: 500px;
                max-height: 315px;
                border: 1px solid #e8e8e8;
                background-color: #fff;
                box-shadow: 0 3px 20px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
                border-radius: 15px;
                padding: 20px;
            }
            .txt-center {
                text-align: -webkit-center;
            }
        </style>


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i> Contract</h1>
            <p>Booked Contract Details</p>
            @if(Session::has('success'))
            <div style="color: red" class="alert alert-success">
                {{Session::get('success')}}
            </div>
           @endif
        </div>
        <a href="{{ route('contracts.contracts.index') }}" class="btn btn-primary pull-right">Registered Contract</a>
        <!-- {{ route('contracts.contracts.create') }} -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <!-- <th>Name </th> -->
                            <th> Propsed price(Ugx/kg)</th>
                            <th> Suggested price(Ugx/kg)</th>
                            <th> Quality </th>
                            <th>Quantity(kgs)</th>
                            <th>
                            Request status 
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contract_histories as $product) 
                            @foreach($contracts as $auth)  
                            @if($auth->id==$product->contract_id)                            
                                
                                <tr>
                                     
                                    
                                    <td>
                                       
                                              {{ $product->price }}
                                    </td>                                   
                                    
                                    <td>
                                    <!-- {{ $product->suggest_price }} -->
                                     @if($product->suggest_price==$product->price)
                                           <div class="row">
                                                 <div style="color:green;" class="col-md-3">
                                                            {{ $product->price }}
                                            </div>
                                            <div style="color:green;" class="col-md-3">
                                                    Accepted
                                            </div>
                                           </div>
                                    @else
                                        @if($seller_id)
                                        
                                        @if($seller_id->farmer_reason=='Accepted' || $seller_id->buyer_reason=='Accepted')
                                            @if($seller_id->farmer_reason=='Accepted')
                                                <div class="row">
                                                     <div style="color:green;" class="col-md-3">
                                                                {{ $seller_id->farmer_price }}
                                                </div>
                                                <div style="color:green;" class="col-md-3">
                                                        Accepted
                                                </div>
                                                </div>
                                            @else
                                                 <div class="row">
                                                     <div style="color:green;" class="col-md-3">
                                                                {{ $seller_id->buyer_price }}
                                                </div>
                                                <div style="color:green;" class="col-md-3">
                                                        Accepted
                                                </div>
                                                </div>
                                            @endif
                                          
                                        @else
                                        <!-- {{$product->suggest_price}} -->
                                          @if($seller_id->buyer_price)
                                              @if($seller_id->nagotiator=='sell')
                                             <div class="row">
                                                  <div style="color:orange;" class="col-md-3">
                                                {{ $seller_id->buyer_price }}
                                                </div>
                                                <div style="color:orange;" class="col-md-3">
                                                <div style="color:darkred;" class="col">
                                                 Wait
                                                </div>
                                                </div>
                                              @else
                                                  <div class="row">
                                                        <div style="color:orange;" class="col-md-3">
                                                        {{ $seller_id->buyer_price }}
                                                        </div>
                                                        <div style="color:orange;" class="col-md-3">
                                                        <div style="color:darkred;" class="col">
                                                        <a class="" data-toggle="modal" href="" data-target="#edit_price_details{{$product->id}}">
                                                                {{$seller_id->buyer_reason}}
                                                        </a>
                                                        </div>
                                                        </div>
                                                @endif
                                          @else
                                            @if($seller_id->farmer_reason=='Accepted' || $seller_id->buyer_reason=='Accepted')
                                                    @if($seller_id->farmer_reason=='Accepted')
                                                    <div class="row">
                                                            <div style="color:green;" class="col-md-3">
                                                                        {{ $seller_id->farmer_price }}
                                                        </div>
                                                        <div style="color:green;" class="col-md-3">
                                                                Accepted
                                                        </div>
                                                        </div>
                                                    @else
                                                        <div class="row">
                                                            <div style="color:green;" class="col-md-3">
                                                                                {{ $seller_id->buyer_price }}
                                                                </div>
                                                                <div style="color:green;" class="col-md-3">
                                                                        Accepted
                                                            </div>
                                                        </div>
                                                    @endif
                                                
                                            @else

                                                @if($seller_id)
                                                    <div class="row">
                                                                <div style="color:orange;" class="col-md-3">
                                                            {{ $product->suggest_price }}
                                                            </div>
                                                            <div style="color:orange;" class="col-md-3">
                                                                <a class="" data-toggle="modal" href="" data-target="#edit_price_details{{$product->id}}">
                                                                {{$seller_id->buyer_reason}}
                                                                </a>
                                                            </div>
                                                    </div>
                                                @else
                                                <div class="row">
                                                    <div style="color:orange;" class="col-md-3">
                                                    {{ $product->suggest_price }}
                                                    </div>
                                                    <div style="color:orange;" class="col-md-3">
                                                    <a class="" data-toggle="modal" href="" data-target="#edit_price_details{{$product->id}}">
                                                            Nagotiate {{$seller_id->buyer_reason}}
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                    
                                            @endif
                                          @endif
                                           
                                        @endif
                                        @else
                                        <!-- {{$product->suggest_price}} -->
                                          <div class="row">
                                                <div style="color:orange;" class="col-md-3">
                                            {{ $product->suggest_price }} 
                                            </div>
                                            <div style="color:orange;" class="col-md-3">
                                                
                                                    <a class="" data-toggle="modal" href="" data-target="#edit_price_details{{$product->id}}">
                                                        Nagotiate
                                                    </a>
                                            </div>
                                            <div>
                                        @endif
                                        
                                    @endif
                                    </td>                                 
                                    
                                    <td>
                                    
                                     {{$product->quality}}
                                      
                                   </td> 
                                    <td>                                         
                                     {{$product->quantity}}
                                    </td>                                    
                                     
                                    <td >
                                        
                                        @if($seller_id)
                                            @if($seller_id->buyer_reason=='Accepted' || $seller_id->farmer_reason=='Accepted')
                                               <a href="{{route('downloadpdf',$seller_id->id)}}" >Download Contract</a>
                                            @else
                                               nagotiations
                                            @endif
                                          @elseif($product->suggest_price==$product->price)
                                               <a href="{{route('downloadpdf',$product->id)}}" >Download Contract</a>
                                        @else
                                            nagotiations
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- sign contract -->
            @foreach($contract_histories as $product)
            <div class="modal fade" id="edit_specialities_details{{$product->id}}" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content" style="width:260%">
                        <div class="modal-header">
                            <h5 class="modal-title">Sign the Contract</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" enctype="multipart/form-data" method="post">
                                @csrf
                            
                                   <div class="form-group card-label">
                                        <label for="recipient-name" class="col-form-label"><strong>Name</strong></label>
                                    <!--     <input readonly
                                        class="form-control @error('name') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter attribute name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $product->contract_id) }}"
                                    /> -->
                                    {{$product->contract_id}}
                                              <input type="hidden" name="id" value="{{$product->id}}">
                                    </div>
                                    <div class="form-group card-label">
                                        <!-- <label for="Description" class="col-form-label"><strong>Description</strong> </label> -->
                                        <!-- <textarea readonly class="form-control @error('CompanyDescription') is-invalid @enderror" name="pdt_summary"  rows="6" cols="40" required> --> 
                                            BY SIGNING BELOW, THE CUSTOMER ACKNOWLEDGES HAVING READ AND UNDERSTOOD THIS CONTRACT AND THAT THE CUSTOMER IS SATISFIED WITH THE TERMS AND CONDITIONS CONTAINED IN THIS CONTRACT. THE CUSTOMER SHOULD NOT SIGN THIS CONTRACT IF THERE ARE ANY BLANK SPACES. THE CUSTOMER IS ENTITLED TO A COPY OF THIS CONTRACT AT THE TIME OF SIGNATURE.
                                        <!-- </textarea> -->
                                    </div>
                                    <div class="form-group card-label">
                                        
                                            <div class="form-group">
                                            <label class="control-label" for="price">Proposed Price</label>
                                          <!--   <input readonly
                                                class="form-control @error('price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Project price"
                                                id="price"
                                                name="price"
                                                value="{{ old('price', $product->price) }}"
                                            />

 -->                                            <!-- <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div> -->

                                            {{$product->price}}</div>
                                        </div>
                                         <div style="width: 550px; height: 100px;margin-left: px; " id="signature-pad" class="jay-signature-pad">
                                        <div class="jay-signature-pad--body">
                                            <canvas id="jay-signature-pad" width=450 height=50></canvas>
                                        </div></div>
                                        <div class="description"><strong> SIGN ABOVE </strong></div>
                                        <button type="button" class="button clear" data-action="clear">Clear</button> &nbsp;
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                     
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /sign contract -->
            <!-- price re-nagotiate Modal -->
            @foreach($contract_histories as $try_m)
            <div class="modal fade" id="edit_price_details{{$try_m->id}}" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content" style="width:260%">
                        <div class="modal-header">
                            <h5 class="modal-title">Price nagotiation of {{$try_m->contract_id}} @ {{$try_m->suggest_price}} with the buyer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('price')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                   <div class="form-group card-label">
                                        <label for="recipient-name" class="col-form-label"><strong>New price</strong></label>
                                        <input type="number" class="form-control" id="price" name="price"
                                             required >
                                              <input type="hidden" name="id" value="{{$try_m->contract_id}}">
                                    </div>
                                     <div>
                                            <div class="form-group card-label">
                                                <label class="control-label" for="brand_id">Reason</label>
                                                <select  name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror" required="required">
                                                    <option value="">select reason</option>
                                                        <option value="Accepted">Accepted</option>
                                                        <option value="Renogatiate">Renogatiate</option>
                                                        <option value="Rejected">Rejected</option>
                                                        <option value="Too low">Too low</option>
                                                        <option value="At least">At least</option>
                                                </select>
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('reason') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /price re-nagotiate Modal -->
            
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

        <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
        <script>
            var wrapper = document.getElementById("signature-pad");
            var clearButton = wrapper.querySelector("[data-action=clear]");
            var changeColorButton = wrapper.querySelector("[data-action=change-color]");
            var savePNGButton = wrapper.querySelector("[data-action=save-png]");
            var saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
            var saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
            var canvas = wrapper.querySelector("canvas");
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
            });
            // Adjust canvas coordinate space taking into account pixel ratio,
            // to make it look crisp on mobile devices.
            // This also causes canvas to be cleared.
            function resizeCanvas() {
                // When zoomed out to less than 100%, for some very strange reason,
                // some browsers report devicePixelRatio as less than 1
                // and only part of the canvas is cleared then.
                var ratio =  Math.max(window.devicePixelRatio || 1, 1);
                // This part causes the canvas to be cleared
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
                // This library does not listen for canvas changes, so after the canvas is automatically
                // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
                // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
                // that the state of this library is consistent with visual state of the canvas, you
                // have to clear it manually.
                signaturePad.clear();
            }
            // On mobile devices it might make more sense to listen to orientation change,
            // rather than window resize events.
            window.onresize = resizeCanvas;
            resizeCanvas();
            function download(dataURL, filename) {
                var blob = dataURLToBlob(dataURL);
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement("a");
                a.style = "display: none";
                a.href = url;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
            }
            // One could simply use Canvas#toBlob method instead, but it's just to show
            // that it can be done using result of SignaturePad#toDataURL.
            function dataURLToBlob(dataURL) {
                var parts = dataURL.split(';base64,');
                var contentType = parts[0].split(":")[1];
                var raw = window.atob(parts[1]);
                var rawLength = raw.length;
                var uInt8Array = new Uint8Array(rawLength);
                for (var i = 0; i < rawLength; ++i) {
                    uInt8Array[i] = raw.charCodeAt(i);
                }
                return new Blob([uInt8Array], { type: contentType });
            }
            clearButton.addEventListener("click", function (event) {
                signaturePad.clear();
            });
            changeColorButton.addEventListener("click", function (event) {
                var r = Math.round(Math.random() * 255);
                var g = Math.round(Math.random() * 255);
                var b = Math.round(Math.random() * 255);
                var color = "rgb(" + r + "," + g + "," + b +")";
                signaturePad.penColor = color;
            });
            savePNGButton.addEventListener("click", function (event) {
                if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
                } else {
                var dataURL = signaturePad.toDataURL();
                download(dataURL, "signaturea.png");
                }
            });
            saveJPGButton.addEventListener("click", function (event) {
                if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
                } else {
                var dataURL = signaturePad.toDataURL("image/jpeg");
                download(dataURL, "signature.jpg");
                }
            });
            saveSVGButton.addEventListener("click", function (event) {
                if (signaturePad.isEmpty()) {
                alert("Please provide a signature first.");
                } else {
                var dataURL = signaturePad.toDataURL('image/svg+xml');
                download(dataURL, "signature.svg");
                }
            });
        </script>
         <script type="text/javascript" src="{{asset('js/signature_pad.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/signature_pad1.min.js')}}"></script>
@endpush
 <script type="text/javascript" src="{{asset('js/signature_pad.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/signature_pad1.min.js')}}"></script>
