@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="col-4 mx-auto text-center">
            <a href="" style="color: #5829B8; font-weight: 800; font-size: 250%;" class="d-block nl-4"><img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248451/finance-tracker/Finance_money_Dollar_management_cash_savings_salary-512_sgdosn.png" alt="Logo" style="width:40px;" class="mx-auto img-fluid"><span class="mt-2">fintrack</span></a>
        </div>
        <div class="col-md-6 offset-md-3 pt-5 pb-5 mt-5 mb-3" style="text-align: center; border: thin solid #868080;">
            <h4 style="font-weight: 200; font-size: 150%;" class="mb-5">Hey! It's okay, we forget too.</h4>

            @if($msg = session('status'))
                <div class="alert alert-success">
                    {{ $msg }}
                </div>
            @endif
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @endif" placeholder="Email">
                        @error('email')
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <button class="btn col-md-12 pt-2 pb-2" style="background-color: #5829B8; color: #fff; font-size: 110%; font-weight: 300;">Reset
                                Password</button>
                        </div>
                    </div>
                </div>

            </form> <br>

        </div>
    </div>

@endsection
