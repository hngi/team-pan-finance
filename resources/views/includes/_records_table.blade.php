<button class="btn btn-primary my-4 d-block" data-toggle="collapse" data-target="#{{ $id }}_report">Show Records</button>
<div id="{{ $id }}_report" class="collapse table-responsive">
    <table class="table table-hover table-sm">
        <thead>
        <tr>
            <th>Date</th>
            <th>Item</th>
            <th>Description</th>
            <th>Amount (NGN)</th>
        </tr>
        </thead>
        <tbody>
        @forelse($records as $expense)
            <tr>
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
</div>
