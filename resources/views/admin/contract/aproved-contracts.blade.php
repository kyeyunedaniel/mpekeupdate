@extends('admin.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i> Contract</h1>
            <p> Contract Details</p>
        </div>
        <a href="{{ route('contracts.admin.index') }}" class="btn btn-primary pull-right">View Contract</a>
        <!-- {{ route('contracts.contracts.create') }} -->
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Available </th>
                            <th> Propsed price(kg)</th>
                            <th> Maize Type </th>
                            <th>Quantity(kgs)</th>
                            <th style="width:120px; min-width:120px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($contracts as $product) 
                                    
                                <tr>
                                   <td>{{ $product->date_available }}</td>
                                    
                                    <td> UGx:{{ $product->price }}</td>
                                    
                                    <td>
                                    
                                     {{$product->MaizeType}}
                                      
                                   </td> 
                                    <td>                                         
                                     {{$product->quantity}}
                                    </td>                                    
                                     
                                    <td class="">
                                        <div style="margin-left: 30px; " class="btn-group" role="group" aria-label="Second group">
                                            <a href="" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>Approved</a>
                                           
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
