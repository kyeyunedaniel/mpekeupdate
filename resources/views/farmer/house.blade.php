@extends('farmer.app')
@section('title') ware_house @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class=""></i> List of all warehouses registered within the system</h1>
        </div>
        
        <div class="row">
           @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
           {{Session::get('success')}}
           @endif
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
                            <!-- <th> # </th> -->
                            <th> PHOTO </th>
                            <th>WAREHOUSE</th>
                            <th> MANAGER  </th>
                            <th>CONTACT </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ware_hous as $employ)
                                <tr>
                                  
                                    <td>
                                        <div class="w3-col s12 w3-center">
                                         <img src="{{$employ->logo}}" width="40%" height="10%" class="" alt="">
                                     </div>
                                    </td>
                                    <td>{{ $employ->name }}</td>
                                                                        
                                   @foreach($ware_house as $mana)
                                    @if($mana->id===$employ->user_id)
                                    <td>{{ $mana->name }}</td>
                                    <td>
                                        {{ $mana->contact }}
                                    </td>
                                    @endif
                                    @endforeach
                                   
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
