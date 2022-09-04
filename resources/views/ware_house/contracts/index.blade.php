@extends('ware_house.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i>Available Contract Details</h1>
            <div style="margin-left: 700px">
                <a style="margin-left: 10px" href="{{ url('/ware_house/Rejected-requests') }}" class="btn btn-danger">Rejected Contracts</a> &nbsp;&nbsp;&nbsp;
                <a style="margin-left: 10px" href="{{ route('Accepted_controcts') }}" class="btn btn-primary">Accepted Contracts</a>
            </div>    
         </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                             <th>Date Available </th>
                            <th> Proposed Price </th>
                            <th> Type </th>
                            <th>Quantity(Kgs)</th>
                            <th style="width:120px; min-width:120px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($warehouses as $warehouse)
                            @if($warehouse->user_id==Auth::user()->id)
                            @foreach($contracts as $product)
                             @if($warehouse->id==$product->warehouse_id)
                                    
                                <tr>
                                    <td>{{ $product->date_available }}</td>
                                    
                                    <td> UGx:{{ $product-> price}}</td>
                                    
                                    <td>
                                    
                                       {{$product->MaizeType}}
                                      
                                   </td>
                                    <td> 
                                      {{$product->quantity}}
                                     
                                    </td>                                    
                                     
                                    <td class="">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{route('ware_house.contracts.edit',$product->id)}} " class="btn btn-sm btn-primary"><i class="fa fa-eye">Review</i></a>
                                           
                                        </div>&nbsp;&nbsp;
                                        <!-- <i class="fa fa-check"></i>
                                        <i class="fa fa-window-close"></i> -->
                                        
                                    </td>
                                </tr>
                                 @endif
                            @endforeach
                            @endif
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
