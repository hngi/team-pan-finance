@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-4 mx-auto text-center">
            <a href="{{ url('/') }}" style="color: #5829B8; font-weight: 800; font-size: 250%;" class="d-block mx-auto"><img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248451/finance-tracker/Finance_money_Dollar_management_cash_savings_salary-512_sgdosn.png" alt="Logo" style="width:40px;" class="mx-auto img-fluid"><span class="mt-2">fintrack</span></a>
        </div>
        <div class="row">
            <div class="col-md-7 mt-3 pt-5 pb-5" style="border: thin solid #5829B8">
                <div class="container-fluid pt-5 pb-5">
                    <h4>Sign Up For An Account</h4>
                    <p class="mt-4">It's super fast and easy!</p>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row mt-4">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" required>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <button class="btn col-md-12" type="submit" style="background-color: #5829B8; color: #fff; font-size: 110%; font-weight: 300;">Register</button>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <p class="mx-auto mt-2">Already have an account? <a href="login.html" style="color: #5829B8">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 mt-3 pt-5 pb-5" style="text-align: center; border: thin solid #5829B8;">
                <img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248451/finance-tracker/RL-couple-01_t8axck.png" class="img-fluid w-25 d-block mx-auto pt-5">
                <h4 class="d-block mx-auto mt-4">Personal Details</h4>
                <p class="mt-4">We’d like to get to know you, Please fill in your name, email address and password to continue
                </p>
                <div class="col-md-12 mt-5" style="text-align: center;">
                </div>
            </div>
        </div>
    </div>
@endsection
