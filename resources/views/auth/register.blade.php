@extends('layouts.logReg')
@section('content')
    <div class="row mt-5">
        <div class="offset-xl-4 offset-lg-4 offset-md-4 offset-md-1 col-xl-4 col-lg-4 col-md-4 col-sm-10 col-xs-10">
            <a href="/"><img src="{{asset('ext2/images/logo.svg')}}" alt="" class="d-block mx-auto"></a>
            <div class="login-block mt-5">
                <h4><b>Sign Up</b></h4>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <span>Full name</span>
                    <input type="text" name="name" class="custom-input my-2 @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <span>Email</span>
                    <input type="text" class="custom-input my-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <span class="mt-3 d-block">Password</span>
                    <input type="password" class="custom-input my-2 @error('password') is-invalid @enderror" name="password" required  placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="password" class="custom-input my-2" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">

                    <span>Profile type</span>
                    <select name="profileType" class="custom-input">
                        <option value="freelancer">Freelancer</option>
                        <option value="client">Client</option>
                    </select>

                    <input type="submit" value="Sign up" class="mt-2 custom-btn custom-btn-accent float-right">
                </form>
                    <p class="mt-3 text-small">Already have an account? <a href="/login" class="text-primary">Log in</a></p>
            </div>
        </div>
    </div>
@endsection
