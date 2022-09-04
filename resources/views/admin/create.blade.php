@extends('admin.app')
@section('title') Create User Account @endsection
@section('content')
    <div class="app-title">
         <div>
            <h1><i class="fa fa-users"></i> Add user details to the system</h1>
             @if(Session::has('success'))
            <div style="color: red" class="alert alert-success">h
                {{Session::get('success')}}
            </div>
           @endif
        </div>
       <!--  -->
</div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="tile">
                
                <form action="{{url('admin/User/store')}} " method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                         <div class="form-group">
                            <label>User type</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="kind" required>
                                <option value="" disabled selected>Select user kind</option>
                                <option value="admin">Administrator</option>
                                <option value="farmer">Farmer</option>
                                <option value="ware_house">Warehouse Manager</option>
                                <option value="buyer">Buyer</option>
                              </select>
                        </div>
                         <div class="form-group">
                            <label class="control-label" for="Username">Username <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Username" class="form-control @error('Username') is-invalid @enderror" type="text" name="Username" id="Username" value="{{ old('Username') }}"/>
                            @error('Username') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fname">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter First Name" class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ old('fname') }}"/>
                            @error('fname') {{ $message }} @enderror
                        </div>
                         <div class="form-group">
                            <label class="control-label" for="lname">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" value="{{ old('lname') }}"/>
                            @error('lname') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                      <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          <div class="form-group">
                            <label class="control-label" for="tagline">Contact Line <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter contact line" class="form-control @error('tagline') is-invalid @enderror" type="text" name="tagline" id="tagline" value="{{ old('tagline') }}"/>
                            @error('tagline') {{ $message }} @enderror
                        </div>
                       <!--  <div class="form-group">
                            <label><b>About me</b></label>
                            <textarea class="form-control @error('summery') is-invalid @enderror" name="summery" placeholder="summary" rows="6" cols="50" required></textarea>
                            @error('summery') {{ $message }} @enderror
                        </div> -->
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
