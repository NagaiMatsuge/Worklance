@extends('layouts.logReg')

@section('content')
    <div class="row mt-5">
        <div class="offset-xl-4 offset-lg-4 offset-md-4 offset-md-1 col-xl-4 col-lg-4 col-md-4 col-sm-10 col-xs-10">
            <a href="/"><img src="{{asset('ext2/images/logo.svg')}}" alt="" class="d-block mx-auto"></a>
            <div class="login-block mt-5">
                <h4><b>Login</b></h4>
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <span>Email</span>
                    <input type="text" name="email" class="custom-input my-2" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="mt-3 d-block">Password</span>
                    <input id="password" name="password" type="password" class="custom-input my-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="submit" value="Login" class="custom-btn custom-btn-accent float-right">
                </form>
                    <p class="mt-3 text-small">New in our platform? <a href="/register" class="text-primary">Sign Up</a></p>
            </div>
        </div>
    </div>
@endsection