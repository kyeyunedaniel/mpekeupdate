@extends('farmer.app')
@section('title') Contract @endsection
@section('content')


    <div class="app-title">
        <div >
            <h1><i class="fa fa-shopping-bag"></i> Contract</h1>
            <p>Booked Contract Details</p>
        </div>
        <a href="{{ route('contracts.contracts.index') }}" class="btn btn-primary pull-right">Registered Contract</a>
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
                            <th>Name </th>
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
                                     @foreach($contracts as $contract_historie)
                                     @if($product->contract_id==$contract_historie->id)

                                    <td>{{ $contract_historie->name }}</td>
                                    @endif
                                    @endforeach
                                    
                                    <td> UGx:{{ $product->price }}</td>
                                    <td> UGx:{{ $product->suggest_price }}</td>
                                    
                                    <td>
                                    
                                     {{$product->quality}}
                                      
                                   </td> 
                                    <td>                                         
                                     {{$product->quantity}}
                                    </td>                                    
                                     
                                    <td >
                                        @if($product->Request_status==0)
                                        <button style="width: 100px;" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Approve</button>
                                        @else
                                        <button style="width: 100px;" class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Approved</button>
                                        
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
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
