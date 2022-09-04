@extends('farmer.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i> Contract</h1>
            <p> Contract Details</p>
        </div>
        <a style="margin-left: 500px" href="{{route('received_contracts_requests')}}" class="btn btn-success">Booked Contract </a>
         <a style="" href="{{route('contracts.contracts.Rejected-contracts')}}" class="btn btn-danger">Rejected Contract</a>
        <a href="{{ route('contracts.contracts.create') }}" class="btn btn-primary ">create Contract</a>
    </div>
    <div class="row">
         @if(session('success'))
        <div class="alert alert-success" role='alert'>
          {{session('success')}}
        </div>
        @endif
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                             <!-- <th> Available </th> -->
                            <th> Proposed Price </th>
                            <th> Maize Type </th>
                            <th>Quantity(Kgs)</th>
                            <th>Warehouse</th>
                            
                            <th style="width:120px; min-width:120px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($contracts as $product)
                                    
                                <tr>
                                    <!-- <td>{{ $product->date_available }}</td> -->
                                    
                                    <td> UGx:{{ $product->price }}</td>
                                    
                                    <td>
                                    
                                       {{$product->MaizeType}}
                                      
                                   </td>
                                    <td> 
                                      {{$product->quantity}}
                                     
                                    </td>   
                                    <td>
                                        @foreach($ware as $wares)
                                        @if($wares->id==$product->warehouse_id)
                                        {{$wares->name}}
                                        @endif
                                        @endforeach
                                    </td>                                                                  
                                     
                                    <td class="">
                                       @forelse($contract_histories as $contract_histor)
                                                    @if($contract_histor->contract_id==$product->id)
                                                       @if($contract_histor->suggest_price==$contract_histor->price)
                                                            <div class="btn-group" role="group" aria-label="Second group"> 
                                                            <strong><p style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;color: green; margin-left:50px">Sold</p></strong>
                                                            </div>
                                                        @elseif($seller_id!=='')  
                                                            @if($seller_id->buyer_reason=='Accepted' || $seller_id->farmer_reason=='Accepted')
                                                             <div class="btn-group" role="group" aria-label="Second group"> 
                                                            <strong><p style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;color: green; margin-left:50px">Sold</p></strong>
                                                            </div>
                                                            @else                                                      
                                                            <strong><p style="color: orange; margin-left:10px ">Nagotiations</p></strong>
                                                        @endif
                                                        @else                                                      
                                                            <strong><p style="color: orange; margin-left:10px ">Nagotiations</p></strong>
                                                        @endif
                                                        
                                                    @elseif($product->status==0 && $contract_histor->contract_id==$product->id) 
                                                    
                                                        <!-- @if($product->status==0 && $contract_histor->contract_id==$product->id)  -->
                                                        <div style = "margin-left:50px" class="btn-group" role="group" aria-label="Second group"> 
                                                        <a href=" " class="btn btn-sm btn-danger">Rejected</a>
                                                         </div>
                                                        @else
                                                         <div class="btn-group" role="group" aria-label="Second group"> 
                                                        <a href="{{route('contracts.contracts.edit',$product->id)}} " class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                    </div>

                                                        <div style = "margin-left:50px" class="btn-group" role="group" aria-label="Second group">
                                                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                         </div>
                                                        <!-- @endif     -->

                                                   
                                                    @endif
                                        @empty

                                                    <div class="btn-group" role="group" aria-label="Second group"> 
                                                            <a href="{{route('contracts.contracts.edit',$product->id)}} " class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                        </div>

                                                        <div style = "margin-left:50px" class="btn-group" role="group" aria-label="Second group">
                                                            @if($product->status==0)  
                                                            <a href=" " class="btn btn-sm btn-danger">Rejected</a>
                                                            @else
                                                            <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                            @endif    

                                                    </div>
                                            
                                        @endforelse                                       
                                        
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
