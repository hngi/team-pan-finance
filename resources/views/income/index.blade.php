@extends('layouts.app')
@section('content')
    @if($msg = session('success'))
        <div class=" mt-4 alert alert-success">{{ $msg }}</div>
    @endif
    <div class="my-4 table-responsive">
        <h3>INCOME RECORDS</h3>
        <a href="{{ route('income.create') }}" class="btn btn-primary my-4 float-right">Add New Record</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Action</th>
                <th>Date</th>
                <th>Category</th>
                <th>Description</th>
                <th>Amount (NGN)</th>
            </tr>
            </thead>
            <tbody>
            @forelse($incomes as $income)
                <tr>
                    <td>
                        <a href="{{ route('income.show', $income->hashed_id) }}" class="text-info" data-toggle="tooltip" data-placement="top" title="View Images">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('income.edit', $income->hashed_id) }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="javascript:void(0)" onclick="deleteItem(`{{ $income->hashed_id }}`)" class="text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                    <td>{{ $income->date->format('Y-m-d') }}</td>
                    <td>{{ $income->category->name }}</td>
                    <td>{{ $income->description ?? '--' }}</td>
                    <td>{{ number_format($income->amount) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">You are yet to add a record.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {!! $incomes->links() !!}
        <form id="deleteItem" class="d-none" method="post">
            @method('delete')
            @csrf
        </form>
    </div>
@endsection
@push('script')
    <script>

        function myFunction() {
            window.print();
        }

        function deleteItem(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    let deleteForm = $(`form#deleteItem`);
                    $(deleteForm).attr('action', `{{ url('/income/') }}/${id}`);
                    $(deleteForm).submit();
                }
            })
        }
    </script>
@endpush
