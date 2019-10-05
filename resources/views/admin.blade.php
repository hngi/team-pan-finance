@extends('layouts.admin')

@section('content')
    <div class="pl-5">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h2>Home</h2>
                <p style="font-size: 120%; font-weight: 300;">
                    Welcome Administrator {{ Auth::user()->first_name }}</p>
            <div class="col-md-12">
                    <a class="btn btn-primary p-3 mt-1" href="{{ route('admin.dashboard') }}">View App Users</a>
            </div>

            <div class="my-4 table-responsive">
                <h3>App Users</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Account creation date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">You are yet to add a record.</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                {!! $users->links() !!}
            </div>
    </div>
@endsection
