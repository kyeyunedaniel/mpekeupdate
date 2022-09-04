@extends('admin.app')
@section('title') Update User Account @endsection
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
                                @if($useMpeke->user_type)
                                 @foreach($ware_house as $man)
                                 @if($man->id===$employee->user_id)
                                <option value="{{ $useMpeke->user_type}}" selected>{{ $useMpeke->user_type }}</option>
                                @endif
                                @endforeach
                                @else

                                <option>Select user kind</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Farmer">Farmer</option>
                                <option value="Warehouse">Warehouse Manager</option>
                                <option value="Buyer">Buyer</option>
                                 @endif
                              </select>
                        </div>
                         <div class="form-group">
                            <label class="control-label" for="Username">Username <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Username" class="form-control @error('Username') is-invalid @enderror" type="text" name="Username" id="Username" value="{{ old('Username',$useMpeke->username) }}"/>
                            @error('Username') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fname">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter First Name" class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ old('name',$useMpeke->fname) }}"/>
                            @error('fname') {{ $message }} @enderror
                        </div>
                         <div class="form-group">
                            <label class="control-label" for="lname">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" value="{{ old('lname',$useMpeke->lname) }}"/>
                            @error('lname') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="email" id="email" placeholder="Enter Email" value="{{ old('email',$useMpeke->email) }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                      
                          <div class="form-group">
                            <label class="control-label" for="tagline">Tag Line <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('tagline') is-invalid @enderror" type="text" name="tagline" id="tagline" value="{{ old('tagline',$useMpeke->tagline) }}"/>
                            @error('tagline') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label><b>About me</b></label>
                            <textarea class="form-control @error('summery') is-invalid @enderror" name="summery" placeholder="summary" rows="6" cols="50" required></textarea>
                            @error('summery') {{ $message }} @enderror
                        </div>
                         <div class="row">
                            <div class="w3-col s12 col-md-4  w3-center">                          
                            <img src="{{$useMpeke->photo}}" width="45%" height="45%" class="" alt=""></div>
                            <div class="col-md-3 form-group">
                            <label class="control-label">Profile Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="logo" accept="image/*"/>
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
