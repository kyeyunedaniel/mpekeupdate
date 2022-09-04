@extends('admin.app')
@section('title') Create User Account @endsection
@section('content')
    <div class="app-title">
        <div>
            
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="tile">
                
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                    
                         <div class="form-group">
                            <label class="control-label" for="Warehouse">Warehouse Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Warehouse Name" class="form-control @error('Warehouse') is-invalid @enderror" type="text" name="Warehouse" id="Warehouse" value="{{ old('Warehouse') }}"/>
                            @error('Warehouse') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label><b>country location</b></label>
                              <select class="w3-select w3-border w3-margin-bottom" name="country" required>
                                <option value="" disabled selected>Select country</option>
                                @foreach( $countries as $country)
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                         <div class="form-group">
                            <label class="control-label" for="district">District <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter district location" class="form-control @error('district') is-invalid @enderror" type="text" name="district" id="district" value="{{ old('district') }}"/>
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
                            <label class="control-label" for="village">village Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('village') is-invalid @enderror" type="village" name="village" id="village" placeholder="Enter village location" value="{{ old('village') }}"/>
                            @error('village') {{ $message }} @enderror
                        </div>
                          <div class="form-group">
                            <label class="control-label" for="existance">Years of existance <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('existance') is-invalid @enderror" type="text" name="existance" id="existance" value="{{ old('existance') }}"/>
                            @error('existance') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="grain">Grain Type <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('grain') is-invalid @enderror" type="text" name="grain" id="grain" value="{{ old('grain') }}"/>
                            @error('grain') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="charge">Stroge charge <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('charge') is-invalid @enderror" type="text" name="charge" id="charge" value="{{ old('charge') }}"/>
                            @error('charge') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label><b>Warehouse Manager</b></label>
                              <select class="w3-select w3-border w3-margin-bottom" name="country" required>
                                <option value="" disabled selected>Select Manager</option>
                                @foreach( $ware_house as $country)
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                        <div class="form-group">
                            <label class="control-label">Profile Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button style="margin-left: 310px" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create Account</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
