@extends('farmer.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i>Contract Approval Details</h1>
            <!-- <div style="margin-left: 700px">
                <a style="margin-left: 10px" href="{{ url('/ware_house/Rejected-requests') }}" class="btn btn-danger">Rejected Contracts </a> &nbsp;&nbsp;&nbsp;
                <a href="{{ route('contracts.contracts.ware_house') }}" class="btn btn-primary">Available Contracts </a>
            </div> -->
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
                            <th> Proposed Price (UGx) </th>
                            <th> Maize Type </th>
                            <th>Quantity(Kgs)</th>
                            <th> Warehouse </th>
                            <th>Admin</th>
                            <!-- <th style="width:120px; min-width:120px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th> -->
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($contracts as $product)
                            @if(!$product->status !=='4' || $product->status !=='1')
                                    
                                <tr>
                                    <td>{{ $product->date_available }}</td>
                                    
                                    <td> {{ $product->price }}</td>
                                    
                                    <td>
                                    
                                       {{$product->MaizeType}}
                                      
                                   </td>
                                    <td> 
                                      {{$product->quantity}}
                                     
                                    </td>                                    
                                     
                                    <td>
                                         @if($product->status=='3' || $product->status=='2')
                                         <strong><p style="color: green; ">Approved</p></strong>
                                        @elseif($product->status=='4')
                                         <strong><p style="color: red; ">Rejected</p></strong>
                                         @else
                                         <strong><p style="color: orange; ">Pending</p></strong>
                                        @endif
                                    </td>
                                    <td>
                                         @if($product->status=='2')
                                         <strong><p style="color: green; ">Approved</p></strong>
                                        @elseif($product->status=='0')
                                         <strong><p style="color: red; ">Rejected</p></strong>
                                         @else
                                         <strong><p style="color: orange; ">Pending</p></strong>
                                        @endif
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
