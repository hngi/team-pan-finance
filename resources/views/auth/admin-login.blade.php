@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="col-4 mx-auto text-center">
            <a href="{{ url('/') }}" style="color: #5829B8; font-weight: 800; font-size: 250%;" class="d-block nl-4"><img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248451/finance-tracker/Finance_money_Dollar_management_cash_savings_salary-512_sgdosn.png" alt="Logo" style="width:40px;" class="mx-auto img-fluid"><span class="mt-2">fintrack</span></a>
        </div>
        <div class="col-md-6 offset-md-3 pt-5 pb-5 mt-5 mb-3" style="text-align: center; border: thin solid #868080;">
            <h4 style="font-weight: 200; font-size: 150%;">Welcome back!</h4>
            <p style="font-weight: 600; font-size: 120%;">Administrator Login</p>
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('admin.password.request'))
                                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            {{-- <div class="col-md-10 offset-md-1">
                <p class="mx-auto mt-2" style="font-weight: 300; color: #868080">By clicking on Log In, you agree to our terms & conditions and privacy policy
                </p>
            </div> --}}
        </div>
    </div>
@endsection
