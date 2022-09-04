@extends('admin.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i>Accepted Contract Details</h1>
        <a style="margin-left: 500px" href="{{ route('rejectstore_review') }}" class="btn btn-danger">Rejected Requests</a> &nbsp;&nbsp;&nbsp;
        <a href="{{ route('contracts.contracts.ware_house') }}" class="btn btn-primary pull-right">Available Requests</a>
        <a href="{{ route('admin.contracts.create') }}" class="btn btn-primary pull-right">Add Contract</a>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                             <th>Date Available </th>
                            <th> Proposed Price </th>
                            <th> Quality </th>
                            <th>Quantity(Kgs)</th>
                            <th style="width:120px; min-width:120px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($contracts as $product)
                            @if(!$product->status !=='4' || $product->status !=='1')
                                    
                                <tr>
                                   <td>{{ $product->date_available }}</td>
                                    
                                    <td> UGx:{{ $product->quantity }}</td>
                                    
                                    <td>
                                    
                                       {{$product->quality}}
                                      
                                   </td>
                                    <td> 
                                      {{$product->price}}
                                     
                                    </td>                                    
                                     
                                    <td class="">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{route('edit-accepted',$product->id)}} " class="btn btn-sm btn-primary"><i class="fa fa-eye">Review</i></a>
                                           
                                        </div>&nbsp;&nbsp;
                                        <!-- <i class="fa fa-check"></i>
                                        <i class="fa fa-window-close"></i> -->
                                        
                                    </td>
                                </tr>
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
