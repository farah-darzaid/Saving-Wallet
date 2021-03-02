@extends('layouts.app')

@section('content')
    <div id="user">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-2">
                    <a href="{{ url()->previous() }}">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                    <div class="card">
                        <div class="card-header">{{ __('Add Transaction') }}</div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                <span>Transaction Added</span>
                            </div>
                        @endif

                        @if(session('exists'))
                            <div class="alert alert-danger">
                                <span>Transaction Already Exists</span>
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="/user/add-transaction">
                                @csrf
                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Transaction type') }}</label>

                                    <div class="col-md-6">
                                        <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" autofocus>
                                            <option selected disabled>Select transaction type</option>
                                            @foreach($transactions as $transaction)
                                                    <option  value="{{ $transaction->type }}">{{ $transaction->type }}</option>
                                            @endforeach
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Transaction name') }}</label>

                                    <div class="col-md-6">
                                        <select id="name" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>
                                        </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>

                                    <div class="col-md-6">
                                        <input id="value" type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}"  autofocus>

                                        @error('value')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2 offset-md-10 mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 offset-md-10 mt-5">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTransaction" data-whatever="@mdo">Add New Transaction</button>
                </div>

                <div class="modal fade" id="newTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Transaction</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/user/add-transaction" id="new-transaction-form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="type" class="col-form-label">{{ __('Transaction type: ') }}</label>
                                        <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" autofocus>
                                            <option selected disabled>Select transaction type</option>
                                            @foreach($transactions as $transaction)
                                                <option  value="{{ $transaction->type }}">{{ $transaction->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-form-label">{{ __('Transaction name: ') }}</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="value" class="col-form-label">{{ __('Value: ') }}</label>
                                        <input type="number" class="form-control" id="value" name="value">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" form="new-transaction-form">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function()
        {
            $("#type").change(function()
            {
                $.ajax(
                    {
                        url: "{{ route('select-transaction') }}?type=" + $(this).val(),
                        method: 'GET',
                        success: function(data) {
                            $('#name').html(data.html);
                        }
                    });
            });

        });
    </script>
@endsection
