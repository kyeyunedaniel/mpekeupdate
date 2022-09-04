@extends('ware_house.app')
@section('title') Update warehouse Account @endsection
@section('content')
    <div class="app-title">
        <div>
            
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="tile">
                
                <form action=" {{route('ware_house.update')}} " method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    
                         <div class="form-group">
                            <label class="control-label" for="Warehouse">Warehouse Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Warehouse Name" class="form-control @error('Warehouse') is-invalid @enderror" type="text" name="Warehouse" id="Warehouse" value="{{ old('Warehouse',$employee->name) }}"/>
                            @error('Warehouse') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>country location</label>
                            <input  class="form-control @error('district') is-invalid @enderror" type="text" name="district" id="district" value="{{$employee->country}}" disabled />
                            @error('district') {{ $message }} @enderror
                            
                              <select class="w3-select w3-border w3-margin-bottom" name="country" required>
                                
                                <option value="{{ $employee->country}}" selected> </option>
                               
                              </select>
                             
                            </div> 
                         <div class="form-group">
                            <label class="control-label" for="district">District <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter district location" class="form-control @error('district') is-invalid @enderror" type="text" name="district" id="district" value="{{ old('district',$employee->district) }}"/>
                            @error('district') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="subcounty">Subcounty <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="subcounty" id="subcounty" placeholder="Enter subcoutry location" value="{{ old('subcounty',$employee->sub_county) }}"/>
                            @error('subcounty') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="parish">Parish location <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('parish') is-invalid @enderror" type="parish" name="parish" id="parish" placeholder="Enter Parish location" value="{{ old('parish',$employee->parish) }}"/>
                            @error('parish') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="village">village <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('village') is-invalid @enderror" type="village" name="village" id="village" placeholder="Enter village location" value="{{ old('village',$employee->village) }}"/>
                            @error('village') {{ $message }} @enderror
                        </div>
                          <div class="form-group">
                            <label class="control-label" for="existance">Years of existance <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Years of existance" class="form-control @error('existance') is-invalid @enderror" type="text" name="existance" id="existance" value="{{ old('existance',$employee->existance) }}"/>
                            @error('existance') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="grain">Grain Type <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Grain Type" class="form-control @error('grain') is-invalid @enderror" type="text" name="grain" id="grain" value="{{ old('grain',$employee->grain_type) }}"/>
                            @error('grain') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="charge">Storage charge <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Stroge charge" class="form-control @error('charge') is-invalid @enderror" type="text" name="charge" id="charge" value="{{ old('charge',$employee->charges) }}"/>
                            @error('charge') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>Warehouse Manager</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="manager_id" required>
                              

                                @if(Auth::user()->name)
                                <option value="{{ Auth::user()->id}}" selected>{{ Auth::user()->name }}</option>
                                @else
                                 <option value="" disabled selected>Select Manager</option>
                                <option value="{{ Auth::user()->name }}">{{ Auth::user()->name }}</option>
                                
                                @endif
                                
                                
                              </select>
                            </div>
                       <div class="row">
                            <div class="w3-col s12 col-md-4  w3-center">                          
                            <img src="@if($employee->logo){{asset($employee->logo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="45%" height="45%" class="" alt=""></div>
                            <div class="col-md-3 form-group">
                            <label class="control-label">Profile Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="logo" accept="image/*"/>
                            @error('image') {{ $message }} @enderror
                        </div>

                        </div>
                    </div>
                    <div class="tile-footer">
                        <button style="margin-left: 320px;" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Account</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
