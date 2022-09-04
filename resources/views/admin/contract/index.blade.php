@extends('admin.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i> Contracts</h1>
            <p>Submitted Contract Details</p>
        </div>
        <a style="margin-left: 550px" href="{{ route('rejectstore_review') }}" class="btn btn-danger">Rejected Contracts</a>&nbsp;
        <!-- <a href="{{ route('contracts.contracts.ware_house') }}" class="btn btn-primary pull-right">Available Requests</a> -->
       
        <a href="{{ route('admin.contracts.create') }}" class="btn btn-primary pull-right">Create Contract</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Farmer</th>
                            <th>Available </th>
                           <th> Proposed Price (UGx) </th>
                            <th> Maize Type </th>
                            <th>Quantity(Kgs)</th>
                            <th style="width:120px; min-width:120px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                             @foreach($contracts as $product)
                                    
                                <tr>
                                    @foreach($farmer as $user)
                                    @if($user->id==$product->user_id)
                                    <td>{{$user->name}}</td>
                                    @endif
                                    @endforeach
                                    <td>{{ $product->date_available }}</td>
                                    
                                    <td> {{ $product->price }}</td>
                                    
                                    <td>
                                    
                                       {{$product->MaizeType}}
                                      
                                   </td>
                                    <td> 
                                      {{$product->quantity}}
                                     
                                    </td>                                    
                                     
                                    <td class="">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            @if($product->status==3)
                                            <a href="{{route('admin.contracts.edit',$product->id)}} " class="btn btn-sm btn-primary"><i class="fa fa-eye">Review</i></a>
                                            @elseif($product->status==0)
                                            <a href="{{ route('rejectstore_review') }}" class="btn btn-sm btn-secondary">Rejected</a>
                                            @endif
                                           
                                        </div>&nbsp;&nbsp;
                                       <!--  <div class="btn-group" role="group" aria-label="Second group">                                          
                                            <a href="{{route('contracts.contracts.reject',$product->id)}}" class="btn btn-sm btn-danger">Review</a>
                                        </div> -->
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
