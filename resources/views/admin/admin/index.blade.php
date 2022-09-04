@extends('admin.app')
@section('title') ADMINISTRATORS @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class=""></i> List of all administrators on the system</h1>
        </div>
        <a href="{{ route('admin.User.create') }}" class="btn btn-primary pull-right">Add administrators</a>
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
                            <th>FULL NAME </th>
                            <th> EMAIL ADDRESS </th>
                            <th>CONTACT </th>
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <th>USERNAME </th>
                            
                            <!-- <th class="text-center">FARMER image </th> -->
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $employ)
                                <tr>
                                  
                                    <td>
                                        <div class="w3-col s12 w3-center">
                                         <img src="@if($employ->photo){{asset($employ->photo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="20%" height="2%" class="" alt="">
                                     </div>
                                    </td>
                                    <td>{{ $employ->name }}</td>
                                    <td>{{ $employ->email }}</td>
                                    <td>
                                        {{ $employ->contact }}
                                    </td>
                                     <td>
                                        {{ $employ->username }}
                                    </td>
                                   
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">EDIT</i></a>
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
