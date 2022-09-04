@extends('buyer.app')
@section('title') ware_house @endsection
@section('content')
    <div class="app-title">
        <div>
           <h2 class="title-page">My Account - Orders</h2>
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
                            <th >Order No.</th>
                                <th >Full Name</th>
                                <th >Order Amount</th>
                                <th >Qty.</th>
                                <th >Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                  
                                    <td >{{ $order->order_number }}</td>
                                    <td>{{ $order->first_name }}</td>
                                    <td>{{ config('settings.currency_symbol') }}{{ round($order->grand_total, 2) }}</td>
                                    <td>{{ $order->item_count }}</td>
                                    <td>{{ strtoupper($order->status) }}</td>
                                 
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
