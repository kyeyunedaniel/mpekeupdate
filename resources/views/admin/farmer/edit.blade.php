    @extends('admin.app')
    @section('title') Update User Account @endsection
    @section('content')
        <div class="app-title">
            <div>
                <h1>Update Farmer Account</h1>
            </div>
        </div>
        @include('admin.partials.flash')
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="tile">
                    
                    <form action="{{route('admin.farmer.update')}}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$employee->id}}">
                        <div class="tile-body">
                             <div class="form-group">
                            <label>User type</label>
                              <select class="w3-select w3-border w3-margin-bottom" name="kind" required>
                                @if($employee->user_type)
                                <option value="{{ $employee->user_type}}" selected>{{ $employee->user_type }}</option>
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
                            <input placeholder="Enter Username" class="form-control @error('Username') is-invalid @enderror" type="text" name="Username" id="Username" value="{{ old('Username',$employee->username) }}"/>
                            @error('Username') {{ $message }} @enderror
                        </div>
                           <div class="form-group">
                            <label class="control-label" for="fname">Full Name <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter First Name" class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ old('fname',$employee->name) }}"/>
                            @error('fname') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tagline">Tel Line <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter Last Name" class="form-control @error('tagline') is-invalid @enderror" type="text" name="tagline" id="tagline" value="{{ old('tagline',$employee->contact) }}"/>
                            @error('tagline') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input placeholder="Enter email" class="form-control @error('fname') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email',$employee->email) }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="row">
                            <div class="w3-col s12 col-md-4  w3-center">                          
                            <img src="@if($employee->photo){{asset($employee->photo)}}@else{{asset('frontend/images/avatar3.png')}}@endif" width="45%" height="45%" class="" alt=""></div>
                            <div class="col-md-3 form-group">
                            <label class="control-label">Profile Photo</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="logo" accept="image/*"/>
                            @error('image') {{ $message }} @enderror
                        </div>

                        </div>

                        <div class="tile-footer">
                            <button style="margin-left: 310px" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>UPDATE</button>                            
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')

    @endpush
