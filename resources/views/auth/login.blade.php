@extends('layouts.app')

@section('content')
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section  class="login-content">
    <div  class="logo">
        <h1>{{ config('app.name') }}</h1>

    </div>
    <div class="login-box" >
        <form class="login-form" action="{{ route('login') }}" method="POST" role="form">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
             @if(Session::has('success'))
            <div style="color: red" class="alert alert-success">
                {{Session::get('success')}}
            </div>
           @endif
            <div class="form-group">
                <label class="control-label" for="email">Email Address</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Email address" autofocus value="{{ old('email') }}">
                    @error('email') {{ $message }} @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input class="form-control @error('password') is-invalid @enderror " type="password" id="password" name="password" placeholder="Password">
                @error('password') {{ $message }} @enderror
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember"><span class="label-text">Stay Signed in</span>
                        </label>
                        <label style="margin-left:25px "><a href="{{url('password/reset ')}} ">Forgot password</a></label>
                    </div>
                </div>
            </div>
            <div class="form-group btn-container" >
                <button  class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
    </div>
</section>
@endsection
