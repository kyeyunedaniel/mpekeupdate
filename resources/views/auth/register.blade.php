@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#009688">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center " ><h2>Create account</h2></div>
                @if(Session::has('success'))
            <div style="color: red" class="alert alert-success">
                {{Session::get('success')}}
            </div>
           @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">User type<span class="m-l-5 text-danger"> *</span></label>
                            <div class="col-md-6">
                              <select class="form-control custom-select" name="kind" required>
                                <option value="" disabled selected>Select user kind</option>
                                <option value="buyer">Buyer</option>
                                <option value="farmer">Farmer</option>
                                <option value="transporter">Transporter</option>
                                <option value="processor">Processor</option>
                                <option value="ware_house">Warehouse Manager</option>
                              </select>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="fname">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <div class="col-md-6">
                            <input placeholder="Enter First Name" class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ old('fname') }}" required/>
                            @error('fname') {{ $message }} @enderror
                        </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="lname">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <div class="col-md-6">
                            <input placeholder="Enter Last Name" class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" value="{{ old('lname') }}" required/>
                            @error('lname') {{ $message }} @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="Username">Username <span class="m-l-5 text-danger"> *</span></label>
                            <div class="col-md-6">
                            <input placeholder="Enter Username" class="form-control @error('Username') is-invalid @enderror" type="text" name="Username" id="Username" value="{{ old('Username') }}" required/>
                            @error('Username') {{ $message }} @enderror
                        </div>
                    </div>

                      <!-- <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="City">City <span class="m-l-5 text-danger"> *</span></label>
                            <div class="col-md-6">
                            <input placeholder="Enter your city" class="form-control @error('City') is-invalid @enderror" type="text" name="City" id="City" value="{{ old('City') }}"/>
                            @error('City') {{ $message }} @enderror
                        </div>
                    </div>

                      <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="Username">Address <span class="m-l-5 text-danger"> *</span></label>
                            <div class="col-md-6">
                            <input placeholder="Enter address" class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}"/>
                            @error('address') {{ $message }} @enderror
                        </div>
                    </div>
 -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}<span class="m-l-5 text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number ') }}<span class="m-l-5 text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="contact" type="Number" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="Number">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="m-l-5 text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<span class="m-l-5 text-danger"> *</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Profile Photo</label>
                            <div class="col-md-6">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*" required/>
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>

                        <div class="form-group row mb-0">
                            <div style="position: static; " class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SUBMIT') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
