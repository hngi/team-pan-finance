@extends('layouts.app')
@section('content')
    <div class=""  role="tabpanel" aria-labelledby="profile-tab">
        <h2 class="ml-3">Edit Income Details</h2>
        @if($msg = session('success'))
            <div class="alert alert-success">
                {{ $msg }}
            </div>
        @endif
        <form action="{{ route('income.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="date" name="picture"  class="form-control" id="picture" placeholder="Picture">
                        @error('picture')
                        <small class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" name="date" value="{{ old('date', $income->date->format('Y-m-d')) }}" class="form-control" id="datepicker" placeholder="Date">
                        @error('date')
                        <small class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="category" class="form-control" required>
                            <option value="">Category</option>
                            @foreach($categories as $category)
                                <option
                                    @if($category->id == old('category', $income->category_id)) selected @endif
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="number" id="amount" name="amount" value="{{ old('amount', $income->amount) }}" class="form-control" placeholder="Amount Spent">
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
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" name="description" rows="5" id="comment" placeholder="Description">{{ old('description', $income->description) }}</textarea>
                        @error('description')
                        <small class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
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
