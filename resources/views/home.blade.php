@extends('layouts.app')
@push('style')
    <style>
        .nav-pills>li>a {
            background-color: rgb(248, 249, 250);
            color: #5829B8 !important;
        }

        .nav-pills>li>a.active {
            background-color: #5829B8 !important;
            color: #fff !important;
        }

        .nav-tabs>li>a {
            background-color: rgb(248, 249, 250);
            color: #5829B8 !important;
        }

        .nav-tabs>li>a.active {
            background-color: #5829B8 !important;
            color: #fff !important;
        }

        .btn-primary {
            background-color: #5829B8 !important;
            color: #fff;
            border: thin solid #5829B8;
        }
    </style>
@endpush
@section('content')
    <div class="pl-5">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h2>Home</h2>
                <p style="font-size: 120%; font-weight: 300;">
                    {{ $first_timer ? "Welcome": "Welcome back"}}, {{ $user->full_name }}</p>
                <h4 class="pt-3 pb-3 mb-5 col-md-4" style="background-color: #fff">Total expenses tracked by you:
                    <br><br> NGN
                    {{ number_format($user->expenses->sum('amount')) }}
                </h4>
                 <h4 class="pt-3 pb-3 mb-5 col-md-4" style="background-color: #fff">Total Income recordd by you
                    <br><br> NGN
                    {{ number_format($user->incomes->sum('amount')) }}
                </h4>

                <div class="col-md-12">
                    <a class="btn btn-primary p-3 mt-1" href="{{ route('expenses.create') }}">RECORD AN EXPENSE</a>
                    <a class="btn btn-primary p-3 mt-1" href="{{ route('income.create') }}">ADD INCOME RECORD</a>
                    <a class="btn btn-primary p-3 mt-1" href="{{ route('income.index') }}">VIEW INCOME RECORDS</a>
                    <a class="btn btn-primary p-3 mt-1" button onclick="myFunction()" href="#">PRINT RECORD</a>
                    <a class="btn btn-primary p-3 mt-1" href="{{ route('expense.report.download') }}">DOWNLOAD RECORD</a>
                </div>
            </div>

            @if($msg = session('success'))
            <div class=" mt-4 alert alert-success">{{ $msg }}</div>
            @endif
            <div class="my-4 table-responsive">
                <h3>EXPENSES RECORDS</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Action</th>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Amount (NGN)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($expenses as $expense)
                    <tr>
                        <td>
                            <a href="{{ route('expenses.show', $expense->hashed_id) }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('expenses.edit', $expense->hashed_id) }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="deleteItem(`{{ $expense->hashed_id }}`)" class="text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>{{ $expense->date->format('Y-m-d') }}</td>
                        <td>{{ $expense->item }}</td>
                        <td>{{ $expense->description ?? '--' }}</td>
                        <td>{{ number_format($expense->amount) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">You are yet to add a record.</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                {!! $expenses->links() !!}
                <form id="deleteItem" class="d-none" method="post">
                    @method('delete')
                    @csrf
                </form>
            </div>
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
                $(deleteForm).attr('action', `{{ url('/expenses/') }}/${id}`);
                $(deleteForm).submit();
            }
        })
    }
</script>
@endpush
