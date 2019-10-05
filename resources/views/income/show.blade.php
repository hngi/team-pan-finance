@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td style="width: 30%">Category</td>
                    <td>{{ $income->category->name }}</td>
                </tr>
                <tr>
                    <td style="width: 30%">Description</td>
                    <td>{{ $income->description }}</td>
                </tr>
                <tr>
                    <td style="width: 30%">Image</td>
                    <td>
                        @if($income->cloudinary_url)
                            <img src="{{ $income->cloudinary_url }}" style="max-height: 300px" class="img-fluid">
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
