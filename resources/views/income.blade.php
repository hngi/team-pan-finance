@extends('layouts.app')
@section('content')
    <div class=""  role="tabpanel" aria-labelledby="profile-tab">
        <h2 class="ml-3">Add Income Details</h2>
        @if($msg = session('success'))
            <div class="alert alert-success">
                {{ $msg }}
            </div>
        @endif
        <form action="{{ route('expenses.store') }}" method="post">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="item" value="{{ old('item') }}"  class="form-control" id="usr" placeholder="Item">
                            @error('item')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="number" id="amount" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Amount Spent">
                            <div class="input-group-append">
                                <span class="input-group-text">NGN</span>
                            </div>
                            @error('amount')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="date" name="date" value="{{ old('date') }}" class="form-control" id="datepicker" placeholder="Date">
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" name="description" rows="5" id="comment" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-block mx-auto col-md-6 pt-3 pb-3">ADD
                    INCOME
                </button>
        </form>
    </div>
@endsection