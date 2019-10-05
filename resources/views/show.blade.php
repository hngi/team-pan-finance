@extends('layouts.app')
@section('content')
    <h3>
        Details for Expense Record: {{ $expense->item }}  
        <a href="{{ route('expenses.edit', $expense->hashed_id) }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Edit">
            <i class="far fa-edit"></i>
        </a>
    </h3>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td style="width: 30%">Category</td>
                    <td>{{ $expense->date->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <td style="width: 30%">Category</td>
                    <td>{{ $expense->item }}</td>
                </tr>
                <tr>
                    <td style="width: 30%">Description</td>
                    <td>{{ $expense->description }}</td>
                </tr>
                <tr>
                    <td style="width: 30%">Image</td>
                    <td>
                        @if($expense->picture_url)
                            <img src="{{ $expense->picture_url }}" style="max-height: 300px" class="img-fluid">
                        @else
                            No Image
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
