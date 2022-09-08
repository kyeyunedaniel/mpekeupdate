@extends('admin.app')
@section('title') FARMERS @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class=""></i> List of all registered farmers in the system</h1>
        </div>
        <a href="http://127.0.0.1:8000/admin/User/create" class="btn btn-primary pull-right">Add Farmer</a>
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
                            <th>FARMER NAME </th>
                            <th class="text-center">FARMER EMAIL </th>
                            <th class="text-center">FARMER PHOTO </th>
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <!-- <th>FARMER PHONE </th> -->
                            
                            <!-- <th class="text-center">FARMER image </th> -->
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($farm as $employ)
                                <tr>
                                  
                                    
                                    <td>{{ $employ->name }}</td>
                                    <td>{{ $employ->email }}</td>
                                    <td>
                                        <div class="w3-col s12 w3-center">
                                             <img src="{{asset($employ->photo)}}" width="20%" height="2%" class="" alt="">
                                         </div>
                                    </td>
                                   
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('armer.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">&nbsp;EDIT</i></a>
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
