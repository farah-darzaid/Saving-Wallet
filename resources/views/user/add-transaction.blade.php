@extends('layouts.app')

@section('content')
    <div id="user">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                    <div class="card">
                        <div class="card-header">{{ __('Add New Transaction') }}</div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                <span>Transaction Added</span>
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="/user/add-transaction">
                                @csrf
                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Transaction type') }}</label>

                                    <div class="col-md-6">
                                        <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" autofocus>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->type }}</option>
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
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
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
        </div>
    </div>
@endsection
