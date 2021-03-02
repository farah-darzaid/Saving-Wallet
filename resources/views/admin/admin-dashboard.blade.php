@extends('layouts.app')

@section('content')
    <div id="admin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-10 col-sm-12 mx-auto">
                    <table class="table table-striped table-dark mt-5 text-center">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Birthday</th>
                            <th>Total Expenses</th>
                            <th>Total Income</th>
                            <th>Wallet Balance</th>
                            <th>Register Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->birthday }}</td>
                                <td>{{ $user['incomes'] }}</td>
                                <td>{{ $user['expenses'] }}</td>
                                <td>{{ $user['incomes']-$user['expenses'] }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
