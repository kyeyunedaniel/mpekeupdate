@extends('ware_house.app')
@section('title') Update warehouse Accounts @endsection
@section('content')
    <div class="app-title">
        <div>
            
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="tile">
                
                <form  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <input type="hidden" name="id" value="{{$employee->id}}">

                        <div class="form-group">
                                  <label for="inputCity">Reason</label>
                                  <textarea type="text" class="form-control" row='3' name="reason" placeholder="warehouse reason reject" id="inputCity">{{$employee->reason}}</textarea>
                                </div> 
                                         
                         <div class="form-group">
                            <label class="control-label" for="Warehouse">Warehouse Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Warehouse Name" class="form-control @error('Warehouse') is-invalid @enderror" type="text" name="Warehouse" id="Warehouse" value="{{ old('Warehouse',$employee->name) }}"/>
                            @error('Warehouse') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>country location</label>
                            <input class="form-control" type="text" value="{{ $employee->country}}" name="">
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
                            <input placeholder="Enter Years of existance" class="form-control @error('grain') is-invalid @enderror" type="text" name="grain" id="grain" value="{{ old('grain',$employee->grain_type) }}"/>
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
                              

                                @if($employee->user_id)
                                 @foreach($ware_house as $man)
                                    @if($man->id===$employee->user_id)

                                <option value="{{ $man->id}}" selected>{{ $man->name }}</option>
                                @endif
                                @endforeach
                                @else
                                @foreach($ware_house as $man)
                                 <option value="" disabled selected>Select Manager</option>
                                <option value="{{ $man->name }}">{{ $man->name }}</option>
                                @endforeach
                                
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
                    <div class="tile-footer text-center">
                        
                         <div style="text:center;" class="btn-group" role="group" aria-label="Second group">
                            <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit">Re-request Account approve</i></a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
