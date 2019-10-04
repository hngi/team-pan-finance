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
<div id="records" class="my-4 table-responsive">
    <h3>EXPENSES RECORDS</h3>
    <table class="table table-hover">
        <thead>
                <tr>
                <th>Date</th>
                <th>Item</th>
                <th>Description</th>
                <th>Amount (NGN)</th>
            </tr>
        </thead>
        <tbody>
        @forelse($expenses as $expense)
        <tr>
            <td>{{ $expense->date->format('Y-m-d') }}</td>
            <td>{{ $expense->item }}</td>
            <td>{{ $expense->description }}</td>
            <td>{{ number_format($expense->amount) }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No records Available </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>
<div id="editor"></div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>

    <script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };
    $(document).ready(function(){
        $(".collapse-panel").html("");
        doc.fromHTML($('#records').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('reports.pdf');
        });
</script>
@endpush