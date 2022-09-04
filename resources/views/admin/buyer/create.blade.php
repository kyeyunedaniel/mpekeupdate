@extends('admin.app')
@section('title') Create User Account @endsection
@section('content')
    <div class="app-title">
        <div>
            
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="tile">
                
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                         <div class="form-group">
                            <label>User type</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="kind" required>
                                @if($employee->user_type)
                                <option value="{{ $employee->user_type}}" selected>{{ $employee->user_type }}</option>
                                @else
                                <option value="" disabled selected>Select user kind</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Farmer">Farmer</option>
                                <option value="Warehouse">Warehouse Manager</option>
                                <option value="Buyer">Buyer</option>
                                 @endif
                              </select>
                        </div>
                         <div class="form-group">
                            <label class="control-label" for="Username">Username <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Username" class="form-control @error('Username') is-invalid @enderror" type="text" name="Username" id="Username" value="{{ old('Username') }}"/>
                            @error('Username') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fname">Full Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter email" class="form-control @error('fname') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email',$employee->email) }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                         <div class="form-group">
                            <label class="control-label" for="lname">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" value="{{ old('lname') }}"/>
                            @error('lname') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="email" name="email" id="email" placeholder="Enter Email" value="{{ old('email',$employee->email) }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Enter Password" value="{{ old('password') }}"/>
                            @error('password') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Confirm Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('Confirm_password') is-invalid @enderror" type="Confirm_password" name="password" id="Confirm_password" placeholder="Enter Confirm Password" value="{{ old('Confirm_password') }}"/>
                            @error('Confirm_password') {{ $message }} @enderror
                        </div>
                          <div class="form-group">
                            <label class="control-label" for="tagline">Tel Line <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('tagline') is-invalid @enderror" type="text" name="tagline" id="tagline" value="{{ old('tagline',$employee->contact) }}"/>
                            @error('tagline') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label><b>About me</b></label>
                            <textarea class="form-control @error('summery') is-invalid @enderror" name="summery" placeholder="summary" rows="6" cols="50" required></textarea>
                            @error('summery') {{ $message }} @enderror
                        </div>
                        <div class="row">
                            <div class="w3-col s12 col-md-4  w3-center">                          
                                         <img src="{{$employee->photo)}}" width="45%" height="45%" class="" alt=""></div>
                            <div class="col-md-3 form-group">
                            <label class="control-label">Profile Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*"/>
                            @error('image') {{ $message }} @enderror
                        </div>

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
