@extends('layouts.app')

@section('content')
    <div id="user">
        <div class="container">
            <div class="row mt-5">
                <a href="/user/add-transaction" class="col-lg-5 col-md-12 col-sm-12">
                        Add Transaction

                </a>

                <a href="/user/my-transaction" class="col-lg-5 col-md-12 col-sm-12">
                        My Transactions
                </a>
            </div>
        </div>
    </div>
@endsection
