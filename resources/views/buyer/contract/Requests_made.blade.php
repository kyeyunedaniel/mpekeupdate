@extends('buyer.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i> Contract</h1>
            <p> Contract Detail Requests Sent</p>
        </div>
        <a href="{{ url('buyer/contracts') }}" class="btn btn-primary pull-right">Available Contract</a>
         @if(session('status'))
        <div class="alert alert-success" role='alert'>
          {{session('status')}}
        </div>
        @endif
        <!-- {{ route('contracts.contracts.create') }} -->
    </div>
   @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
                {{Session::get('success')}}
            </div>
           @endif
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
                                    
                                <tr>
                                    <!-- <td>{{ $product->contract_pdt_name }}</td> -->
                                    <td>                                     
                                       {{ $product->price }}

                                    </td>

                                    <td> 
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
                                       @if($buyer_id->nagotiator=='buy')
                                         @if($buyer_id->buyer_reason=='Accepted')
                                          <div class="row">
                                               <div style="color:green;" class="col-md-3">
                                            {{ $buyer_id->buyer_price }}
                                            </div>
                                            <div style="color:green;" class="col-md-3">
                                                Accepted
                                            </div>
                                            </div>
                                           @else 
                                         <div class="row">
                                               <div style="color:orange;" class="col-md-3">
                                            {{ $buyer_id->farmer_price }}
                                            </div>
                                            <div style="color:orange;" class="col-md-3">
                                                Wait
                                            </div>
                                            </div>
                                            @endif 
                                       @else
                                        @if($buyer_id->farmer_reason=='Accepted')
                                          <div class="row">
                                               <div style="color:green;" class="col-md-3">
                                            {{ $buyer_id->farmer_price }}
                                            </div>
                                            <div style="color:green;" class="col-md-3">
                                                Accepted
                                            </div>
                                            </div>
                                           @else 
                                           <div class="row">
                                                <div style="color:orange;" class="col-md-3">
                                            {{ $buyer_id->farmer_price }}
                                            </div>
                                            <div style="color:orange;" class="col-md-3">
                                                <a class="" data-toggle="modal" href="" data-target="#edit_price_details{{$product->id}}">
                                                 {{$buyer_id->farmer_reason}}
                                                </a>
                                            </div>
                                            </div>
                                       @endif
                                       @endif
                                       
                                    @endif
                                    
                                    </td>
                                                                        

                                    <td>
                                    
                                     {{$product->quality}}
                                      
                                   </td> 
                                    <td>                                         
                                     {{$product->quantity}}
                                    </td>    
                                    <td>
                                        @if($product->suggest_price==$product->price)
                                               <a href="{{route('downloadpdf',$product->id)}}" >Download Contract</a>
                                       
                                        @elseif($buyer_id !=='')
                                            @if($buyer_id->buyer_reason=='Accepted' || $buyer_id->farmer_reason=='Accepted')
                                              <a href="{{route('downloadpdf',$buyer_id->id)}}" >Download Contract</a>
                                            @else
                                             nagotiations
                                            @endif
                                         @else
                                            nagotiations
                                        @endif
                                        
                                    </td>
                                </tr>
                                 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     @foreach($contract_histories as $try_m)
            <div class="modal fade" id="edit_price_details{{$try_m->id}}" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content" style="width:260%">
                        <div class="modal-header">
                            <?php
                            $courseh = App\Models\Nagotiation::where(['buyer_id' =>auth()->user()->id])->latest()->first();
                            // echo $courseh;
                            ?>
                            <h5 class="modal-title">Price nagotiation of  UGx
                                @if($courseh)
                                 {{$courseh['farmer_price']}}
                                @else
                                {{$try_m->suggest_price}}
                                @endif
                                
                                with the seller</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('price')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                   <div class="form-group card-label">
                                        <label for="recipient-name" class="col-form-label"><strong>Last price</strong></label>
                                        @if($prod)
                                          <input  value="{{$try_m->suggest_price}} " type="text" class="form-control" id="price" name="price"
                                             required >
                                            <input type="hidden" name="id" value="{{$prod->product_id}}">
                                            @else
                                              <input  value="{{$product->price}} " type="text" class="form-control" id="price" name="price"
                                             required >
                                              <input type="hidden" name="id" value="{{$product->contract_id}}">
                                              @endif
                                    </div>
                                     <div>
                                            <div class="form-group card-label">
                                                <label class="control-label" for="brand_id">Comment</label>
                                                <select  name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror" required="required">
                                                    <option value="">select reason</option>
                                                        <option value="Accepted">Accepted</option>
                                                        <option value="Renogatiate">Renogatiate</option>
                                                        <option value="Rejected">Rejected</option>
                                                        <option value="Too low">Too High</option>
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
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
