@extends('admin.app')
@section('title') ware_house @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class=""></i> List of all warehouses registered within the system</h1>
        </div>
        <a href="{{ route('admin.User.create') }}" class="btn btn-primary pull-right">Add warehouse manager</a>
        <div class="row">
           @if(Session::has('success'))
            <div style="color: green" class="alert alert-success">
           {{Session::get('success')}}
           @endif
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
                <div class="col-md-3 mx-auto">
            <div class="tile">
                
                <form action=" {{route('admin.ware_house.house.store')}} " method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                    
                         <div class="form-group">
                            <label class="control-label" for="Warehouse">Warehouse Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Warehouse Name" class="form-control @error('Warehouse') is-invalid @enderror" type="text" name="Warehouse" id="Warehouse" value="{{ old('Warehouse') }}"/>
                            @error('Warehouse') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>country location</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="country" required>
                                <option value="" disabled selected>Select country</option>
                                @foreach( $countries as $country)
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                         <div class="form-group">
                            <select class="w3-select w3-border w3-margin-bottom js-example-basic-single" name="district" required>
                            <option value="" disabled selected>select  District</option>
                                      @foreach($districts as $district)
                                      <option value="{{$district->name}}">{{$district->name}}</option>
                                      @endforeach
                            </select>
                            <!-- <label class="control-label" for="district">District <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter district location" class="form-control @error('district') is-invalid @enderror" type="text" name="district" id="district" value="{{ old('district') }}"/> -->
                            @error('district') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="subcounty">Subcounty <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="subcounty" id="subcounty" placeholder="Enter subcoutry location" value="{{ old('subcounty') }}"/>
                            @error('subcounty') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="parish">Parish location <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('parish') is-invalid @enderror" type="parish" name="parish" id="parish" placeholder="Enter Parish location" value="{{ old('parish') }}"/>
                            @error('parish') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="village">village <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('village') is-invalid @enderror" type="village" name="village" id="village" placeholder="Enter village location" value="{{ old('village') }}"/>
                            @error('village') {{ $message }} @enderror
                        </div>
                          <div class="form-group">
                            <label class="control-label" for="existance">Years of existance <span class="m-l-5 text-danger"> *</span></label>
                             <input class="form-control @error('existance') is-invalid @enderror" type="text" name="existance" id="existance" placeholder="Enter Years of existance" value="{{ old('existance') }}"/>
                            @error('existance') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="grain">Grain Type <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Grain Type" class="form-control @error('grain') is-invalid @enderror" type="text" name="grain" id="grain" value="{{ old('grain') }}"/>
                            @error('grain') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="charge">Storage charge <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Storage charge" class="form-control @error('charge') is-invalid @enderror" type="text" name="charge" id="charge" value="{{ old('charge') }}"/>
                            @error('charge') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>Warehouse Manager</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="manager_id" required>
                                <option value="" disabled selected>Select Manager</option>
                                @foreach( $ware_house as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                        <div class="form-group">
                            <label class="control-label">Profile Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="logo" accept="image/*"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button style="" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create Account</button>
                        
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
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
                            <!-- <th class="text-center"> Project Duration </th> -->
                            <!-- <th>USERNAME </th> -->
                            
                            <!-- <th class="text-center">FARMER image </th> -->
                            <th class=" text-danger"><i class="fa fa-bolt"> </i>Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ware_hous as $employ)
                                <tr>
                                  
                                    <td>
                                        <div class="w3-col s12 w3-center">
                                         <img src="{{asset($employ->logo)}}" width="40%" height="10%" class="" alt="">
                                     </div>
                                    </td>
                                    <td>{{ $employ->name }}</td>
                                                                        
                                   @foreach($ware_house as $mana)
                                    @if($mana->id===$employ->user_id)
                                    <td>{{ $mana->email }}</td>
                                    <td>
                                        {{ $mana->contact }}
                                    </td>
                                    @endif
                                    @endforeach
                                   
                                  
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            @if($employ->status=='1')
                                            <a href="{{ route('admin.ware_house.house.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">Approved</i></a>
                                            @elseif($employ->status=='2')
                                            <a href="{{ route('admin.ware_house.house.edit_rej', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">Rejected</i></a>
                                            @elseif($employ->status=='0')
                                            <a href="{{ route('admin.ware_house.house.edit', $employ->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit">View</i></a>
                                            @endif
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" >
    // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
