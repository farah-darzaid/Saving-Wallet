@extends('layouts.app')

@section('content')
    <div id="user">
        <div class="container">
            <div class="row mb-5 py-2 bg-white">
                <div class="col-lg-2">
                    <a href="{{ url()->previous() }}">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                    <table class="table table-striped table-dark mt-5">
                        <thead>
                            <tr>
                                <th>Transaction Type</th>
                                <th>Transaction Name</th>
                                <th>Transaction amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($my_transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->name }}</td>
                                <td>{{ $transaction->value }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row my-5 mx-auto">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h4>Income Total</h4>
                    <hr>
                    <p>{{ $incomes }}</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h4>Expense Total</h4>
                    <hr>
                    <p>{{ $expenses }}</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h4>Wallet Balance</h4>
                    <hr>
                    <p>{{ $incomes-$expenses }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
