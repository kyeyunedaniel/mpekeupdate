@extends('admin.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i> Contract</h1>
            <p>Rejected Contract Details</p>
        </div>
        <a href="{{ route('contracts.admin.index') }}" class="btn btn-primary pull-right">View Contract</a>
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
                            <th>Name </th>
                           <th> Proposed Price </th>
                            <th> Quality </th>
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
                                    <td>{{ $product->name }}</td>
                                    
                                    <td> UGx:{{ $product->quantity }}</td>
                                    
                                    <td>
                                    
                                       {{$product->quality}}
                                      
                                   </td>
                                    <td> 
                                      {{$product->price}}
                                     
                                    </td>                                    
                                     
                                    <td class="">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                           
                                            <a href="" class="btn btn-sm btn-secondary">Review</a>                                           
                                           
                                        </div>
                                        
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
