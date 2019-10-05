@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="col-4 mx-auto text-center">
            <a href="{{ url('/') }}" style="color: #5829B8; font-weight: 800; font-size: 250%;" class="d-block nl-4"><img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248451/finance-tracker/Finance_money_Dollar_management_cash_savings_salary-512_sgdosn.png" alt="Logo" style="width:40px;" class="mx-auto img-fluid"><span class="mt-2">fintrack</span></a>
        </div>
        <div class="col-md-6 offset-md-3 pt-5 pb-5 mt-5 mb-3" style="text-align: center; border: thin solid #868080;">
            <h4 style="font-weight: 200; font-size: 150%;">Welcome back!</h4>
            <p style="font-weight: 600; font-size: 120%;">Please Login</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-check float-left">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" {{ old('remember') ? 'checked' : '' }} name="remember" >Remember Me
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <button class="btn col-md-12 pt-2 pb-2" type="submit" style="background-color: #5829B8; color: #fff; font-size: 110%; font-weight: 300;">Log
                                In</button>
                        </div>
                    </div>
                </div>

            </form> <br>
            <a class="mb-2" href="{{ route('password.request') }}" style="color: #5829B8">Forgot Password?</a>

            <div class="col-md-12" style="text-align: center;">
                <p class="mx-auto mt-2">Don't have an account? <a href="{{ route('register') }}" style="color: #5829B8">Register</a> or <a href="{{ url('auth/google') }}" style="color: #5829B8">SignIn with Google</a>
                </p>
            </div>
            <div class="col-md-10 offset-md-1">
                <p class="mx-auto mt-2" style="font-weight: 300; color: #868080">By clicking on Log In, you agree to our terms & conditions and privacy policy
                </p>
            </div>
        </div>
    </div>
@endsection
