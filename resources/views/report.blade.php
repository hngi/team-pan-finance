@extends('layouts.app')
@section('content')
    <h2 class="ml-3">Total Amount Tracked</h2>
    <div class="container-fluid">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs mt-3">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home1">THIS WEEK</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">THIS MONTH</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">THIS YEAR</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu3">CUSTOM RANGE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu4">ALL TIME</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane container active" id="home1">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4>TOTAL AMOUNT SPENT THIS WEEK: <br><br> NGN
                            {{ number_format($week->sum('amount')) }}
                        </h4>
                        @include('includes._records_table', ['records' => $week, 'id' => 'week'])
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="menu1">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4>TOTAL AMOUNT SPENT THIS MONTH: <br><br> NGN
                           {{ number_format($month->sum('amount')) }}
                        </h4>
                        @include('includes._records_table', ['records' => $month, 'id' => 'month'])
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="menu2">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4>TOTAL AMOUNT SPENT THIS YEAR: <br><br> NGN
                            {{ number_format($year->sum('amount')) }}
                        </h4>
                        @include('includes._records_table', ['records' => $year, 'id' => 'year'])
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="menu4">
                <div class="col-md-6 offset-md-3 mt-5">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h4>TOTAL AMOUNT TRACKED ALL TIME: <br><br> NGN
                                {{ number_format($all_time->sum('amount')) }}
                            </h4>
                            <p class="text-body">
                                All records are accessible on the <a href="{{ route('expenses.index') }}">dashboard page</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="menu3">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4>Pick A Date Range</h4>
                        <div class="spinner-grow d-none" id="report_loading"></div>
                        <div id="response"></div>

                        <form id="get_custom_report" style="max-width: 400px">
                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="date" class="form-control" id="from" required>
                            </div>
                            <div class="form-group">
                                <label for="to">To</label>
                                <input type="date" class="form-control" id="to" required>
                            </div>
                            <button type="submit"  class="btn btn-primary d-block col-md-6">
                                SUBMIT
                            </button>
                        </form>

                        <div id="wrap_records" class="d-none">
                            <button class="btn btn-primary my-4 d-block" data-toggle="collapse" data-target="#response_records">Show Records Tracked in this range</button>
                            <div id="response_records" class="table-responsive collapse">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(`#get_custom_report`).submit((e) => {
            e.preventDefault();
            const spinner = document.getElementById('report_loading');
            const responseRecords = document.getElementById('wrap_records');
            $(`#response`).html('');
            spinner.classList.remove('d-none');
            responseRecords.classList.add('d-none');
            let from = $(`#from`).val();
            let to = $(`#to`).val();
            let url = `{{ route('expenses.report.custom') }}?from=${from}&to=${to}`;
            axios.get(url).then(res =>{
                $(`#response`).html(`TOTAL AMOUNT SPENT DURING SELECTED PERIOD: <b>${res.data.total} NGN</b>`);
                // Create table rows from the records returned from the request
                let rows = '';
                for (let record of res.data.records) {
                    rows +=
                    `<tr>
                    <td>${record.date}</td>
                    <td>${record.item}</td>
                    <td>${record.description}</td>
                    <td>${record.amount}</td>
                    </tr>`
                }
                $(`#response_records tbody`).html(rows);
                responseRecords.classList.remove('d-none');
            }).catch(err => {
                $(`#response`).html(`<span class="text-danger">ERROR: ${err.response.data.message || err.toString()}</span>`);
            }).finally(() => {
                spinner.classList.add('d-none');
            })

        });
    </script>
@endpush
